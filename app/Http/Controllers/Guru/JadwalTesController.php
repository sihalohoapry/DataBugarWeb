<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\JadwalTest;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalTesController extends Controller
{
    public function index(Request $request)
    {

        $query = null;

        if ($request->kelas) {
            $query = JadwalTest::join('sekolahs', 'jadwal_tests.sekolah_id', '=', 'sekolahs.id')
                ->join('kelas', 'jadwal_tests.class_id', '=', 'kelas.id')
                ->join('users', 'jadwal_tests.created_by', '=', 'users.id')
                ->where('kelas.id', '=', $request->kelas)
                ->where('jadwal_tests.created_by', '=', Auth::user()->id)
                ->select(
                    'jadwal_tests.id',
                    'jadwal_tests.sekolah_id',
                    'jadwal_tests.class_id',
                    'jadwal_tests.nomer_tes',
                    'jadwal_tests.start_tes',
                    'jadwal_tests.end_tes',
                    'nama_sekolah',
                    'kelas',
                    'name',
                )
                ->get();
        } elseif ($request->nama) {
            $query = JadwalTest::join('sekolahs', 'jadwal_tests.sekolah_id', '=', 'sekolahs.id')
                ->join('kelas', 'jadwal_tests.class_id', '=', 'kelas.id')
                ->join('users', 'jadwal_tests.created_by', '=', 'users.id')
                ->where('name', 'LIKE', '%' . $request->nama . '%')
                ->where('jadwal_tests.created_by', '=', Auth::user()->id)
                ->select(
                    'jadwal_tests.id',
                    'jadwal_tests.class_id',
                    'jadwal_tests.sekolah_id',

                    'jadwal_tests.nomer_tes',
                    'jadwal_tests.start_tes',
                    'jadwal_tests.end_tes',
                    'nama_sekolah',
                    'kelas',
                    'name',
                )
                ->get();
        } else {
            $query = JadwalTest::join('sekolahs', 'jadwal_tests.sekolah_id', '=', 'sekolahs.id')
                ->join('kelas', 'jadwal_tests.class_id', '=', 'kelas.id')
                ->join('users', 'jadwal_tests.created_by', '=', 'users.id')
                ->where('jadwal_tests.created_by', '=', Auth::user()->id)
                ->select(
                    'jadwal_tests.id',
                    'jadwal_tests.class_id',
                    'jadwal_tests.sekolah_id',

                    'jadwal_tests.nomer_tes',
                    'jadwal_tests.start_tes',
                    'jadwal_tests.end_tes',
                    'nama_sekolah',
                    'kelas',
                    'name',
                )->get();
        }
        $kelas = Kelas::where('user_id', '=', Auth::user()->id)->get();

        return view('pages.guru.index-jadwal', ['datas' => $query, 'kelas' => $kelas]);
    }


    public function createJadwal(Request $request)
    {
        // dd($request->all());
        try {
            $count = JadwalTest::all()->count();
            $data = $request->all();

            $data['created_by'] = Auth::user()->id;
            $data['class_id'] = $request->kelas;
            $data['nomer_tes'] = "BGR00" . $count + 1;
            $data['sekolah_id'] = Auth::user()->sekolah_id;

            JadwalTest::create($data);
            return redirect()->route('jadwal-tes')->with('status', 'Berhasil menambahkan data dengan no tes ' . $data['nomer_tes']);
        } catch (\Throwable $e) {
            return redirect()->route('jadwal-tes')->with('fail', 'gagal menambahkan data. msg: ' . $e);
        }
    }




    public function deleteJadwal(Request $request)
    {
        try {
            $data = JadwalTest::findOrFail($request->idData);
            $data->delete();
            return redirect()->route('jadwal-tes')->with('status', 'Berhasil menghapus jadwal');
        } catch (\Throwable $e) {
            return redirect()->route('jadwal-tes')->with('fail', 'Gagal menghapus jadwal' . $e);
        }
    }


    public function updateJadwal(Request $request)
    {

        try {
            $data = JadwalTest::findOrFail($request->id2);
            $data['sekolah_id'] = $request->sekolah_id2;
            $data['start_tes'] = $request->start_tes2;
            $data['end_tes'] = $request->end_tes2;
            $data['class_id'] = $request->class_id;
            $data->update();
            return redirect()->route('jadwal-tes')->with('status', 'Berhasil mengubah data');
        } catch (\Throwable $e) {
            return redirect()->route('jadwal-tes')->with('fail', 'Gagal mengubah data' . $e);
        }
    }
}
