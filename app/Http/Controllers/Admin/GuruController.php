<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

use function Laravel\Prompts\select;

class GuruController extends Controller
{
    public function index(){
        if (request()->ajax()) {
            // $query = User::query()->where(['role'=>"GURU"]);

            $query = User::join('sekolahs', 'users.sekolah_id', '=', 'sekolahs.id')
                    ->where('role','=',"GURU")
                    ->select('users.id','users.name', 'users.role', 'nama_sekolah','users.created_at','users.sekolah_id');
            
            return DataTables::of($query)
            ->addColumn('action', function ($item) {
                return '
                    <a class="btn btn-danger text-white" data-toggle="modal" data-target="#ModalDelete" onclick = "setParameter(' .  $item->id . ')" >
                                    Hapus
                                </a>
                    <a class="btn btn-primary text-white" href="'. route('edit-guru', $item->id) .'" >
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
        return view("pages.admin.guru");
    }

    public function add(){
        $sekloah = Sekolah::all();
        return view('pages.admin.tambah-guru',['sekolah' => $sekloah],);
    }

    public function create(Request $request){
        try {
            $data = $request->all();
            $data['password'] = Hash::make(date('dmY', strtotime($request->date_of_birth)));
            User::create($data);
            return redirect()->route('guru')->with('status', 'Berhasil menambah guru');
        } catch (\Throwable $th) {
            return redirect()->route('guru')->with('fail', 'Gagal menambah data guru msg: '.$th);
        }
        
    }

    public function deleteGuru(Request $request){
        $data = User::findOrFail($request->idData);
        $data->delete();
        return redirect()->route('guru')->with('status', 'Berhasil menghapus user');
    }

    public function editGuru($id){
        $data = User::findOrFail($id);
        $sekolahSekarang = Sekolah::findOrFail($data->sekolah_id);
        $sekloah = Sekolah::all();
        return view('pages.admin.edit-guru',['data'=>$data, 'sekolah'=>$sekloah, 'sekolahSekarang'=>$sekolahSekarang]);
    }

    public function updateGuru(Request $request, $id){
        try {
            $updateData = User::findOrFail($id);
            $updateData['name'] = $request->name;
            $updateData['password'] = Hash::make(date('dmY', strtotime($request->date_of_birth)));
            $updateData['date_of_birth'] = $request->date_of_birth;
            $updateData['nuptk'] = $request->nuptk;
            $updateData['user'] = $request->nuptk;
            $updateData['role'] = $request->role;
            $updateData['gender'] = $request->gender;
            $updateData['sekolah_id'] = $request->sekolah_id;
            $updateData->update();
            return redirect()->route('guru')->with('status', 'Berhasil mengedit guru');
        } catch (\Throwable $th) {
            return redirect()->route('guru')->with('fail', 'Gagal menambah data guru msg: '.$th);
        }
    }

}
