<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResutIMT;
use App\Models\ResutKebugaran;
use Illuminate\Http\Request;

class FreeTesController extends Controller
{
    public function submitFreetes(Request $request)
    {
        $inputResult = $request->berat / (($request->tinggi / 100) * ($request->tinggi / 100));
        $resultIMT = ResutIMT::where('gender', '=', $request->jenis_klamin)->where('start_value', '<', $inputResult)->where('end_value', '>', $inputResult)->first();
        $inputResultKebugaran = 0.00;
        $jenis_kebugaran = "";
        if ($request->flexRadioDefault == "cooper") {
            $jenis_kebugaran = "Cooper Test";
            $detik = $request->detik_coop / 60;
            $waktu = $request->waktu_lari_coop + $detik;
            if ($request->jenis_klamin == "PRIA") {
                $inputResultKebugaran = 88.02 - (0.1656 * $request->berat) - (2.76 * $waktu) + (3.3716 * 1);
            } else {
                $inputResultKebugaran = 88.02 - (0.1656 * $request->berat) - (2.76 * $waktu) + (3.3716 * 0);
            }
        }
        if ($request->flexRadioDefault == "rookport") {
            $jenis_kebugaran = "Rockport Test";

            if ($request->jenis_klamin == "PRIA") {
                $inputResultKebugaran = 132.853 - (0.0769 * $request->berat) - (0.3877 * $request->umur) + (6.315 * 1) - (3.2649 * $request->waktu_jalan) - (0.1565 * $request->denyut_nadi_setelah);
            } else {
                $inputResultKebugaran = 132.853 - (0.0769 * $request->berat) - (0.3877 * $request->umur) + (6.315 * 0) - (3.2649 * $request->waktu_jalan) - (0.1565 * $request->denyut_nadi_setelah);
            }
        }
        $resutKebugaran = ResutKebugaran::where('jenis_klamin', '=', $request->jenis_klamin)->where('start_value', '<', $inputResultKebugaran)->where('end_value', '>', $inputResultKebugaran)->first();
        return view('pages.freetes', [
            'resultIMT' => $resultIMT,
            'inputResult' => $inputResult,
            'berat' => $request->berat,
            'tinggi' => $request->tinggi,

            'pushup' => $request->pushup,
            'situp' => $request->situp,
            'backup' => $request->backup,
            'squatjump' => $request->squatjump,
            'pullup' => $request->pullup,

            'jenis_kebugaran' => $jenis_kebugaran,
            'waktu_lari' => $request->waktu_lari_coop,
            'waktu_jalan' => $request->waktu_jalan,
            'resultKebugaran' => $resutKebugaran,
            'inputResultKebugaran' => $inputResultKebugaran,


        ]);
    }
}
