<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResutKebugaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;



class KebugaranController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = ResutKebugaran::all();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <a class="btn btn-danger text-white" data-toggle="modal" data-target="#ModalDelete" onclick = "setParameter(' .  $item->id . ')" >
                                    Hapus
                                </a>
                    <a class="btn btn-primary text-white" data-toggle="modal" data-target="#ModalEdit" onclick = "setParameterEdit(' .  $item->id . ', `' . $item->result . '` , `' . $item->jenis_klamin . '`,  `' . $item->start_value . '`, `' . $item->end_value . '` )" >
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
        return view("pages.admin.result-kebugaran");
    }

    public function add()
    {
        return view('pages.admin.tambah-kebugaran');
    }

    public function createkebugaran(Request $request)
    {
        try {

            $cekDouble = ResutKebugaran::where('result', '=', $request->result)->where('jenis_klamin', '=', $request->jenis_klamin)->get()->count();
            if ($cekDouble == null) {
                $data = $request->all();
                ResutKebugaran::create($data);
                return redirect()->route('result-kebugaran')->with('status', 'Berhasil menambah Result kebugaran');
            } else {
                return redirect()->route('tambah-result-kebugaran')->with('fail', 'Data result kebugaran sudah ada');
            }
        } catch (\Throwable $th) {
            return redirect()->route('result-kebugaran')->with('fail', 'Gagal menambah data result kebugaran msg: ' . $th);
        }
    }

    public function deleteresultkebugaran(Request $request)
    {
        $data = ResutKebugaran::findOrFail($request->idData);
        $data->delete();
        return redirect()->route('result-kebugaran')->with('status', 'Berhasil menghapus data');
    }

    public function editresultkebugaran($id)
    {
        $data = ResutKebugaran::findOrFail($id);
        return view('pages.admin.edit-guru', ['data' => $data]);
    }

    public function updateresultkebugaran(Request $request)
    {
        try {
            $updateData = ResutKebugaran::findOrFail($request->id);
            $updateData['result'] = $request->resultT;
            $updateData['jenis_klamin'] = $request->jenis_klaminT;
            $updateData['start_value'] = $request->start_value;
            $updateData['end_value'] = $request->end_value;
            $updateData->update();
            return redirect()->route('result-kebugaran')->with('status', 'Berhasil mengedit reuslt kebugaran');
        } catch (\Throwable $th) {
            return redirect()->route('result-kebugaran')->with('fail', 'Gagal menambah data reuslt kebugaran msg: ' . $th);
        }
    }
}
