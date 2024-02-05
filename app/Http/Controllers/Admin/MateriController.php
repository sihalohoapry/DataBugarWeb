<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MateriVideo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class MateriController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = MateriVideo::all();
            return DataTables::of($query)
                ->editColumn('deskripsi', function ($item) {
                    return '
                    <p>' .   $item->deskripsi   . '</p>
                ';
                })
                ->addColumn('action', function ($item) {
                    return '
                    <a class="btn btn-danger text-white" data-toggle="modal" data-target="#ModalDelete" onclick = "setParameter(' .  $item->id . ')" >
                                    Hapus
                                </a>
                    <a class="btn btn-primary text-white" href="' . route('edit-materi', $item->id) . '" >
                                    Edit
                    </a>
                ';
                })
                ->editColumn('created_at', function ($query) {
                    return [
                        Carbon::parse($query->created_at)->translatedFormat('d F Y'),
                    ];
                })
                ->rawColumns(['action', 'deskripsi'])
                ->make();
        }
        return view("pages.admin.materi");
    }

    public function add()
    {
        $sekloah = MateriVideo::all();
        return view('pages.admin.tambah-materi', ['sekolah' => $sekloah],);
    }

    public function create(Request $request)
    {
        try {

            $cekData = MateriVideo::where('judul', '=', $request->judul)->count();
            if ($cekData > 0) {
                return redirect()->route('materi')->with('fail', 'Gagal menambah materi, materi sudah pernah di tambah');
            }

            $data = $request->all();
            MateriVideo::create($data);
            return redirect()->route('materi')->with('status', 'Berhasil menambah materi');
        } catch (\Throwable $th) {
            return redirect()->route('materi')->with('fail', 'Gagal menambah data materi msg: ' . $th);
        }
    }

    public function deletemateri(Request $request)
    {
        $data = MateriVideo::findOrFail($request->idData);
        $data->delete();
        return redirect()->route('materi')->with('status', 'Berhasil menghapus deskripsi');
    }

    public function editmateri($id)
    {
        $data = MateriVideo::findOrFail($id);
        return view('pages.admin.edit-materi', ['data' => $data]);
    }

    public function updatemateri(Request $request, $id)
    {
        try {
            $updateData = MateriVideo::findOrFail($id);
            $updateData['judul'] = $request->judul;
            $updateData['deskripsi'] = $request->deskripsi;
            $updateData['url_video'] = $request->url_video;
            $updateData->update();
            return redirect()->route('materi')->with('status', 'Berhasil mengedit materi');
        } catch (\Throwable $th) {
            return redirect()->route('materi')->with('fail', 'Gagal menambah data materi msg: ' . $th);
        }
    }
}
