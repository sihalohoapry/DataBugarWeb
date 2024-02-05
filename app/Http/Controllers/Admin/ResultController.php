<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResutIMT;
use App\Models\Sekolah;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class ResultController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = ResutIMT::all();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <a class="btn btn-danger text-white" data-toggle="modal" data-target="#ModalDelete" onclick = "setParameter(' .  $item->id . ')" >
                                    Hapus
                                </a>
                    <a class="btn btn-primary text-white" data-toggle="modal" data-target="#ModalEdit" onclick = "setParameterEdit(' .  $item->id . ', `' . $item->result . '` , `' . $item->gender . '`,  `' . $item->start_value . '`, `' . $item->end_value . '` )" >
                                    Edit
                    </a>  
                ';
                })
                ->editColumn('created_at', function ($query) {
                    return [
                        Carbon::parse($query->created_at)->translatedFormat('d F Y'),

                    ];
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view("pages.admin.result-imt");
    }

    public function add()
    {
        $sekloah = Sekolah::all();
        return view('pages.admin.tambah-imt');
    }

    public function createIMT(Request $request)
    {
        try {

            $cekDouble = ResutIMT::where('result', '=', $request->result)->where('gender', '=', $request->gender)->get()->count();
            if ($cekDouble == null) {
                $data = $request->all();
                ResutIMT::create($data);
                return redirect()->route('result-imt')->with('status', 'Berhasil menambah Result IMT');
            } else {
                return redirect()->route('tambah-result-imt')->with('fail', 'Data result IMT sudah ada');
            }
        } catch (\Throwable $th) {
            return redirect()->route('result-imt')->with('fail', 'Gagal menambah data result IMT msg: ' . $th);
        }
    }

    public function deleteresultIMT(Request $request)
    {
        $data = ResutIMT::findOrFail($request->idData);
        $data->delete();
        return redirect()->route('result-imt')->with('status', 'Berhasil menghapus data');
    }


    public function updateresultIMT(Request $request)
    {
        try {
            $updateData = ResutIMT::findOrFail($request->id);
            $updateData['result'] = $request->resultT;
            $updateData['gender'] = $request->genderT;
            $updateData['start_value'] = $request->start_value;
            $updateData['end_value'] = $request->end_value;
            $updateData->update();
            return redirect()->route('result-imt')->with('status', 'Berhasil mengedit result imt');
        } catch (\Throwable $th) {
            return redirect()->route('result-imt')->with('fail', 'Gagal menambah data result imt msg: ' . $th);
        }
    }
}
