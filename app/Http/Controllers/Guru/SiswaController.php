<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Imports\SiswaImport;
use App\Models\Kelas;
use App\Models\Sekolah;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index(Request $request)
    {

        $query = null;

        if ($request->kelas) {
            $query = User::join('sekolahs', 'users.sekolah_id', '=', 'sekolahs.id')
                ->join('kelas', 'users.class', '=', 'kelas.id')
                ->where('kelas.id', '=', $request->kelas)
                ->where('users.guru_id', '=', Auth::user()->id)
                ->select('users.id', 'users.name', 'users.nisn', 'nama_sekolah', 'kelas.kelas')->get();
        } elseif ($request->nama) {
            $query = User::join('sekolahs', 'users.sekolah_id', '=', 'sekolahs.id')
                ->join('kelas', 'users.class', '=', 'kelas.id')
                ->where('name', 'LIKE', '%' . $request->nama . '%')
                ->where('users.guru_id', '=', Auth::user()->id)
                ->select('users.id', 'users.name', 'users.nisn', 'nama_sekolah', 'kelas.kelas')->get();
        } else {
            $query = User::join('sekolahs', 'users.sekolah_id', '=', 'sekolahs.id')
                ->join('kelas', 'users.class', '=', 'kelas.id')
                ->where('users.guru_id', '=', Auth::user()->id)
                ->select('users.id', 'users.name', 'users.nisn', 'nama_sekolah', 'kelas.kelas')->get();
        }


        $kelas = Kelas::where('user_id', '=', Auth::user()->id)->get();





        return view('pages.guru.index-siswa', ['datas' => $query, 'kelas' => $kelas]);
    }

    public function add()
    {
        $kelas = Kelas::where('user_id', '=', Auth::user()->id)->get();

        return view('pages.guru.tambah-siswa', ['kelas' => $kelas]);
    }

    public function createSiswa(Request $request)
    {
        $data = User::where('nisn', '=', trim($request->nisn))->count();
        if ($data > 0) {
            return redirect()->route('siswa')->with('fail', 'Gagal menambah data, NISN ' . $request->nisn . ' sudah ada');
        } else {
            $data = $request->all();
            $data['name'] = $request->nama;
            $data['guru_id'] = Auth::user()->id;
            $data['nisn'] = $request->nisn;
            $data['user'] = $request->nisn;
            $data['sekolah_id'] = Auth::user()->sekolah_id;
            $data['role'] = 'SISWA';
            $data['class'] = $request->kelas;
            $data['gender'] = $request->jenis;
            $data['password'] = Hash::make(date('dmY', strtotime($request->date_of_birth)));
            $data['date_of_birth'] = $request->date_of_birth;
            User::create($data);

            return redirect()->route('siswa')->with('status', 'Berhasil menambah data, NISN ' . $request->nisn);
        }
    }

    public function downloadTemplate()
    {
        $filepath = public_path('download/') . "TemplateUploadSiswa.xlsx";
        return Response::download($filepath);
    }

    public function uploadSiswa(Request $request)
    {
        try {
            Excel::import(new SiswaImport($request->kelas), $request->file_upload);
            return redirect()->route('siswa')->with('status', 'Berhasil menambah data');
        } catch (\Throwable $th) {
            return redirect()->route('tambah-siswa')->with('fail', 'Gagal menambah data' . $th);
        }
    }


    public function deleteSiswa(Request $request)
    {
        $data = User::findOrFail($request->idData);
        $data->delete();
        return redirect()->route('siswa')->with('status', 'Berhasil menghapus siswa');
    }


    public function detailSiswa($id)
    {
        $query = User::join('sekolahs', 'users.sekolah_id', '=', 'sekolahs.id')
            ->join('kelas', 'users.class', '=', 'kelas.id')
            ->where('users.id', '=', $id)
            ->select('users.id', 'users.class', 'users.name', 'users.date_of_birth', 'users.gender', 'users.nisn', 'users.sekolah_id', 'nama_sekolah', 'kelas.kelas')->first();


        $kelas = Kelas::where('user_id', '=', Auth::user()->id)->get();


        return view('pages.guru.detail-siswa', ['data' => $query, 'kelas' => $kelas]);
    }



    public function updateSiswa(Request $request)
    {
        try {
            $updateData = User::findOrFail($request->id);
            $updateData['name'] = $request->name;
            $updateData['password'] = Hash::make(date('dmY', strtotime($request->date_of_birth)));
            $updateData['date_of_birth'] = $request->date_of_birth;
            $updateData['nisn'] = $request->nisn;
            $updateData['user'] = $request->nisn;
            $updateData['gender'] = $request->gender;
            $updateData['sekolah_id'] = $request->sekolah_id;
            $updateData['class'] = $request->class;
            $updateData->update();
            return redirect()->route('siswa')->with('status', 'Sukses update data' . $request->name);
        } catch (\Throwable $e) {
            return redirect()->route('siswa')->with('fail', 'Gaga update data' . $request->name . $e);
        }
    }
}
