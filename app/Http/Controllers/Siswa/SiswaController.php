<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\JadwalTest;
use App\Models\TesMET;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class SiswaController extends Controller
{
    public function indexJadwal()
    {
        $datas = JadwalTest::where('sekolah_id', '=', Auth::user()->sekolah_id)->where('class_id', '=', Auth::user()->class)->get();
        return view('pages.siswa.jadwal-tes', ['datas' => $datas]);
    }

    public function mulaiTest($id)
    {
        $tes = JadwalTest::findOrFail($id);
        $dataMET = TesMET::where('tes_id', '=', $id)->where('siswa_id', Auth::user()->id)->first();

        return view('pages.siswa.form-tes-siswa', ['tes' => $tes, 'dataMET' => $dataMET]);
    }

    public function metBerat(Request $request)
    {
        try {
            $cekData = TesMET::where('tes_id', '=', $request->id)->where('siswa_id', '=', Auth::user()->id)->count();
            $data = $request->all();
            if ($cekData == 0) {
                $data['siswa_id'] = Auth::user()->id;
                $data['tes_id'] = $request->id;
                if ($request->metberat == 'ya') {
                    $data['is_fisik_berat'] = true;
                    $data['repetisi_berat'] = $request->repetisiberat;
                    $data['lama_berat'] = $request->lama;
                    $hasil = 8 * $request->repetisiberat * $request->lama;
                    $data['hasil_berat'] = $hasil;
                    $hasilMET = $hasil + 0 + 0;
                    $data['hasil_met'] = $hasilMET;
                } else {
                    $data['is_fisik_berat'] = false;
                }
                TesMET::create($data);
                return redirect()->route('mulai-test', $request->id)->with('status', 'Berhasil submit tes MET bagian Aktifitas Fisik Berat');
            } else {
                $updateData = TesMET::where('tes_id', '=', $request->id)->where('siswa_id', '=', Auth::user()->id)->first();

                $updateData['siswa_id'] = Auth::user()->id;
                $updateData['tes_id'] = $request->id;
                if ($request->metberat == 'ya') {
                    $updateData['is_fisik_berat'] = true;
                    $updateData['repetisi_berat'] = $request->repetisiberat;
                    $updateData['lama_berat'] = $request->lama;
                    $hasil = 8 * $request->repetisi_berat * $request->lama;
                    $updateData['hasil_berat'] = $hasil;
                    $updateData['hasil_met'] = $hasil + $updateData->hasil_sedang + $updateData->hasil_ringan;
                } else {
                    $updateData['is_fisik_berat'] = true;
                }
                $updateData->update;
                return redirect()->route('mulai-test', $request->id)->with('status', 'Berhasil submit tes MET bagian Aktifitas Fisik Berat');
            }
        } catch (\Throwable $e) {
            return redirect()->route('mulai-test', $request->id)->with('fail', 'Gagal mengisi form tes MET');
        }
    }

    public function metSedang(Request $request)
    {
        try {
            $cekData = TesMET::where('tes_id', '=', $request->id)->where('siswa_id', '=', Auth::user()->id)->count();
            $data = $request->all();
            if ($cekData == 0) {
                $data['siswa_id'] = Auth::user()->id;
                $data['tes_id'] = $request->id;
                if ($request->metsedang == 'ya') {
                    $data['is_fisik_sedang'] = true;
                    $data['repetisi_sedang'] = $request->repetisi;
                    $data['lama_sedang'] = $request->lama;
                    $hasil = 4 * $request->repetisi * $request->lama;
                    $data['hasil_sedang'] = $hasil;
                    $hasilMET = $hasil + 0 + 0;
                    $data['hasil_met'] = $hasilMET;
                } else {
                    $data['is_fisik_sedang'] = true;
                }
                TesMET::create($data);
                return redirect()->route('mulai-test', $request->id)->with('status', 'Berhasil submit tes MET bagian Aktifitas Fisik sedang');
            } else {
                $updateData = TesMET::where('tes_id', '=', $request->id)->where('siswa_id', '=', Auth::user()->id)->first();
                // $updateData = TesMET::findOrFail($getData->id);

                $updateData['siswa_id'] = Auth::user()->id;
                $updateData['tes_id'] = $request->id;
                if ($request->metsedang == 'ya') {
                    $updateData['is_fisik_sedang'] = true;
                    $updateData['repetisi_sedang'] = $request->repetisi;
                    $updateData['lama_sedang'] = $request->lama;
                    $hasil = 4 * $request->repetisi * $request->lama;
                    $updateData['hasil_sedang'] = $hasil;
                    $updateData['hasil_met'] = $hasil + $updateData->hasil_berat + $updateData->hasil_ringan;
                } else {
                    $updateData['is_fisik_sedang'] = true;
                }
                $updateData->update();
                return redirect()->route('mulai-test', $request->id)->with('status', 'Berhasil update tes MET bagian Aktifitas Fisik sedang');
            }
        } catch (\Throwable $e) {
            return redirect()->route('mulai-test', $request->id)->with('fail', 'Gagal mengisi form tes MET Aktivitas fisik sedang' . $e);
        }
    }


    public function metRingan(Request $request)
    {
        try {
            $cekData = TesMET::where('tes_id', '=', $request->id)->where('siswa_id', '=', Auth::user()->id)->count();
            $data = $request->all();
            if ($cekData == 0) {
                $data['siswa_id'] = Auth::user()->id;
                $data['tes_id'] = $request->id;
                if ($request->metsedang == 'ya') {
                    $data['is_fisik_ringan'] = true;
                    $data['lama_jalan'] = $request->lama;
                    $hasil = 3.3 * $request->lama;
                    $data['hasil_ringan'] = $hasil;
                    $hasilMET = $hasil + 0 + 0;
                    $data['hasil_met'] = $hasilMET;
                } else {
                    $data['is_fisik_ringan'] = true;
                }
                TesMET::create($data);
                return redirect()->route('mulai-test', $request->id)->with('status', 'Berhasil submit tes MET bagian Aktifitas Fisik ringan');
            } else {
                $updateData = TesMET::where('tes_id', '=', $request->id)->where('siswa_id', '=', Auth::user()->id)->first();
                // $updateData = TesMET::findOrFail($getData->id);

                $updateData['siswa_id'] = Auth::user()->id;
                $updateData['tes_id'] = $request->id;
                $updateData['is_fisik_ringan'] = true;
                $updateData['lama_jalan'] = $request->lama;
                $hasil = 3.3 * $request->lama;
                $updateData['hasil_ringan'] = $hasil;
                $updateData['hasil_met'] = $hasil + $updateData->hasil_berat + $updateData->hasil_sedang;
                $updateData->update();
                return redirect()->route('mulai-test', $request->id)->with('status', 'Berhasil update tes MET bagian Aktifitas Fisik ringan');
            }
        } catch (\Throwable $e) {
            return redirect()->route('mulai-test', $request->id)->with('fail', 'Gagal mengisi form tes MET Aktivitas fisik ringan' . $e);
        }
    }
}
