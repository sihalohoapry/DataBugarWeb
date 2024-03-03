<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\MateriVideo;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function home()
    {
        $countGuru = User::where('role', '=', 'GURU')->count();
        $countSiswa = User::where('role', '=', 'SISWA')->count();
        $countSekolah = Sekolah::all()->count();
        $countMateri = MateriVideo::all()->count();


        return view('pages.home', [
            'countGuru' => $countGuru,
            'countSiswa' => $countSiswa,
            'countSekolah' => $countSekolah,
            'countMateri' => $countMateri,



        ]);
    }
}
