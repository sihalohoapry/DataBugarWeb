<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Sekolah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SekolahController extends Controller
{
    public function index(){
        if (request()->ajax()) {
            $query = Sekolah::all();

            return DataTables::of($query)
            ->editColumn('created_at', function ($query) {
                return [
                     Carbon::parse($query->created_at)->locale('id')->translatedFormat('l, d F Y'),
                    
                ];
            })
            ->addColumn('action', function ($item) {
                return '
                    <a class="btn btn-danger text-white" data-toggle="modal" data-target="#ModalDelete" onclick = "setParameter(' .  $item->id . ')" >
                                    Hapus
                                </a>
                    <a class="btn btn-primary text-white" data-toggle="modal" data-target="#ModalEdit" onclick = "setParameterEdit(' .  $item->id . ', `'. $item->nama_sekolah .'` , `'. $item->kontak .'` , `'. $item->alamat .'`)" >
                                    Edit
                    </a>  
                ';
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view("pages.admin.sekolah");
    }

    public function add(){
        return view('pages.admin.tambah-sekolah');
    }

    public function create(Request $request){
        $data = $request->all();
        $data['nama_sekolah'] = $request->nama_sekolah;
        $data['kontak'] = $request->kontak;
        $data['alamat'] = $request->alamat;
        $data['kota_kabupaten'] = $request->kota_kabupaten;

        Sekolah::create($data);
        return redirect()->route('sekolah')->with('status', 'Berhasil menambah kelas');
    }

    public function delete(Request $request){
        $data = Sekolah::findOrFail($request->idData);
        $data->delete();
        return redirect()->route('sekolah')->with('status', 'Berhasil menghapus user');
    }

    public function updateSekolah(Request $request){
        $data = Sekolah::findOrFail($request->id);
        $data['nama_sekolah'] = $request->nama_sekolah;
        $data['kontak'] = $request->kontak;
        $data['alamat'] = $request->alamat;

        $data->update();
        return redirect()->route('sekolah')->with('status', 'Berhasil edit data user');
    }
}
