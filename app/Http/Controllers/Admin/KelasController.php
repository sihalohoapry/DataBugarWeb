<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Sekolah;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KelasController extends Controller
{
    public function index()
    {
        // if (request()->ajax()) {
        //     $query = Kelas::join('sekolahs', 'kelas.sekolah_id', '=', 'sekolahs.id')
        //             ->select('kelas.id', 'kelas.created_at', 'kelas.kelas', 'nama_sekolah', 'kelas.sekolah_id');


        //     return DataTables::of($query)
        //     ->editColumn('created_at', function ($query) {
        //         return [
        //              Carbon::parse($query->created_at)->locale('id')->translatedFormat('l, d F Y'),

        //         ];
        //     })
        //     ->addColumn('action', function ($item) {
        //         return '
        //             <a class="btn btn-danger text-white" data-toggle="modal" data-target="#ModalDelete" onclick = "setParameter(' .  $item->id . ')" >
        //                             Hapus
        //                         </a>
        // <a class="btn btn-primary text-white" data-toggle="modal" data-target="#ModalEdit" onclick = "setParameterEdit(' .  $item->id . ', `'. $item->sekolah_id .'`, `'. $item->nama_sekolah .'` , `'. $item->kelas .'`)" >
        //                 Edit
        // </a>  
        //         ';
        //     })
        //     ->rawColumns(['action'])
        //     ->make();
        // }

        $query = Kelas::join('sekolahs', 'kelas.sekolah_id', '=', 'sekolahs.id')
            ->select('kelas.id', 'kelas.created_at', 'kelas.kelas', 'nama_sekolah', 'kelas.sekolah_id')
            ->where('kelas.user_id', '=', Auth::user()->id)
            ->get();

        $sekloah = Sekolah::findOrFail(Auth::user()->sekolah_id);

        return view("pages.admin.kelas", [
            'sekolah' => $sekloah,
            'datas' => $query
        ]);
    }

    public function add()
    {
        $sekloah = Sekolah::findOrFail(Auth::user()->sekolah_id);
        return view('pages.admin.tambah-kelas', [
            'sekolah' => $sekloah,
        ]);
    }

    public function create(Request $request)
    {
        $cekData = Kelas::where('sekolah_id', '=', $request->sekolah_id)->where('kelas', '=', strtoupper($request->kelas))->get()->count();
        if ($cekData == 0) {
            $data = $request->all();
            $data['kelas'] = strtoupper($request->kelas);
            $data['sekolah_id'] = $request->sekolah_id;
            $data['user_id'] = Auth::user()->id;
            Kelas::create($data);
            return redirect()->route('kelas')->with('status', 'Berhasil menambah kelas');
        } else {
            return redirect()->route('kelas')->with('fail', 'Kelas sudah tersedia di sekolah tersebut');
        }
    }

    public function delete(Request $request)
    {
        $data = Kelas::findOrFail($request->idData);
        $data->delete();
        return redirect()->route('kelas')->with('status', 'Berhasil menghapus user');
    }

    public function updateKelas(Request $request)
    {
        $data = Kelas::findOrFail($request->id);
        $data['kelas'] = $request->kelas;
        $data['sekolah_id'] = $request->sekolah_id;

        $cekData = Kelas::where('sekolah_id', '=', $request->sekolah_id)->where('kelas', '=', strtoupper($request->kelas))->get()->count();
        if ($cekData > 0) {
            return redirect()->route('kelas')->with('fail', 'Gagal edit data kelas, data sudah ada');
        }

        $data->update();
        return redirect()->route('kelas')->with('status', 'Berhasil edit data kelas');
    }
}
