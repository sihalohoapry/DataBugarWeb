<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\JadwalTest;
use App\Models\MateriVideo;
use App\Models\ResutIMT;
use App\Models\ResutKebugaran;
use App\Models\TesImtKebugaran;
use App\Models\TesMET;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use PhpParser\Node\Stmt\TryCatch;

class SiswaController extends Controller
{
    public function indexJadwal()
    {

        // $query = Kelas::join('sekolahs', 'kelas.sekolah_id', '=', 'sekolahs.id')
        //     ->select('kelas.id', 'kelas.created_at', 'kelas.kelas', 'nama_sekolah', 'kelas.sekolah_id')
        //     ->where('kelas.user_id', '=', Auth::user()->id)
        //     ->get();

        $datas = JadwalTest::join('tes_imt_kebugarans', 'jadwal_tests.id', '=', 'tes_imt_kebugarans.tes_id')
            ->join('tes_m_e_t_s', 'jadwal_tests.id', 'tes_m_e_t_s.tes_id')
            ->where('sekolah_id', '=', Auth::user()->sekolah_id)
            ->where('class_id', '=', Auth::user()->class)->get();

        return view('pages.siswa.jadwal-tes', ['datas' => $datas]);
    }

    public function mulaiTest($id)
    {

        $tes = JadwalTest::findOrFail($id);
        $dataMET = TesMET::where('tes_id', '=', $id)->where('siswa_id', Auth::user()->id)->first();

        $serve = null;
        if (strtoupper(Auth::user()->gender) == 'WANITA') {
            $serve = MateriVideo::whereNotIn('judul', ['PULL UP'])->get();
        } else {
            $serve = MateriVideo::whereNotIn('judul', ['PULL UP WANITA'])->get();
        }

        $hasilTesIMTKebugaran = TesImtKebugaran::where('tes_id', '=', $id)->where('siswa_id', '=', Auth::user()->id)->first();

        return view('pages.siswa.form-tes-siswa', ['tes' => $tes, 'dataMET' => $dataMET, 'serve' => $serve, 'hasilTesIMTKebugaran' => $hasilTesIMTKebugaran]);
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
                    if ($hasilMET > 1500) {
                        $data['result_met'] = 'TINGGI';
                    }
                    if (600 < $hasilMET && $hasilMET <= 1500) {
                        $data['result_met'] = 'MENENGAH';
                    }
                    if (600 >= $hasilMET) {
                        $data['result_met'] = 'RENDAH';
                    }
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
                    $hasil = 8 * $request->repetisiberat * $request->lama;
                    $updateData['hasil_berat'] = $hasil;
                    $updateData['hasil_met'] = $hasil + $updateData->hasil_sedang + $updateData->hasil_ringan;
                    if ($updateData['hasil_met'] > 1500) {
                        $updateData['result_met'] = 'TINGGI';
                    }
                    if (600 < $updateData['hasil_met'] && $updateData['hasil_met'] <= 1500) {
                        $updateData['result_met'] = 'MENENGAH';
                    }
                    if (600 >= $updateData['hasil_met']) {
                        $updateData['result_met'] = 'RENDAH';
                    }
                } else {
                    $updateData['is_fisik_berat'] = true;
                }
                $updateData->update();
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
                    if ($hasilMET > 1500) {
                        $data['result_met'] = 'TINGGI';
                    }
                    if (600 < $hasilMET && $hasilMET <= 1500) {
                        $data['result_met'] = 'MENENGAH';
                    }
                    if (600 >= $hasilMET) {
                        $data['result_met'] = 'RENDAH';
                    }
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
                    if ($updateData['hasil_met'] > 1500) {
                        $updateData['result_met'] = 'TINGGI';
                    }
                    if (600 < $updateData['hasil_met'] && $updateData['hasil_met'] <= 1500) {
                        $updateData['result_met'] = 'MENENGAH';
                    }
                    if (600 >= $updateData['hasil_met']) {
                        $updateData['result_met'] = 'RENDAH';
                    }
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
                    if ($hasilMET > 1500) {
                        $data['result_met'] = 'TINGGI';
                    }
                    if (600 < $hasilMET && $hasilMET <= 1500) {
                        $data['result_met'] = 'MENENGAH';
                    }
                    if (600 >= $hasilMET) {
                        $data['result_met'] = 'RENDAH';
                    }
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
                if ($updateData['hasil_met'] > 1500) {
                    $updateData['result_met'] = 'TINGGI';
                }
                if (600 < $updateData['hasil_met'] && $updateData['hasil_met'] <= 1500) {
                    $updateData['result_met'] = 'MENENGAH';
                }
                if (600 >= $updateData['hasil_met']) {
                    $updateData['result_met'] = 'RENDAH';
                }
                $updateData->update();
                return redirect()->route('mulai-test', $request->id)->with('status', 'Berhasil update tes MET bagian Aktifitas Fisik ringan');
            }
        } catch (\Throwable $e) {
            return redirect()->route('mulai-test', $request->id)->with('fail', 'Gagal mengisi form tes MET Aktivitas fisik ringan' . $e);
        }
    }



    public function metBeratEdit(Request $request)
    {
        try {
            $updateData = TesMET::findOrFail($request->id);

            $updateData['siswa_id'] = Auth::user()->id;
            $updateData['tes_id'] = $request->id;
            if ($request->metberat == 'ya') {
                $updateData['is_fisik_berat'] = true;
                $updateData['repetisi_berat'] = $request->repetisiberat;
                $updateData['lama_berat'] = $request->lama;
                $hasil = 8 * $request->repetisiberat * $request->lama;
                $updateData['hasil_berat'] = $hasil;
                $updateData['hasil_met'] = $hasil + $updateData->hasil_sedang + $updateData->hasil_ringan;
                if ($updateData['hasil_met'] > 1500) {
                    $updateData['result_met'] = 'TINGGI';
                }
                if (600 < $updateData['hasil_met'] && $updateData['hasil_met'] <= 1500) {
                    $updateData['result_met'] = 'MENENGAH';
                }
                if (600 >= $updateData['hasil_met']) {
                    $updateData['result_met'] = 'RENDAH';
                }
            } else {
                $updateData['is_fisik_berat'] = true;
            }
            $updateData->update();
            return redirect()->route('mulai-test', $request->id)->with('status', 'Berhasil update tes MET bagian Aktifitas Fisik Berat');
        } catch (\Throwable $e) {
            return redirect()->route('mulai-test', $request->id)->with('fail', 'Gagal update form tes MET');
        }
    }


    public function metSedangEdit(Request $request)
    {
        try {
            $updateData = TesMET::findOrFail($request->id);

            $updateData['siswa_id'] = Auth::user()->id;
            $updateData['tes_id'] = $request->id;
            if ($request->metsedang == 'ya') {
                $updateData['is_fisik_sedang'] = true;
                $updateData['repetisi_sedang'] = $request->repetisi;
                $updateData['lama_sedang'] = $request->lama;
                $hasil = 4 * $request->repetisi * $request->lama;
                $updateData['hasil_sedang'] = $hasil;
                $updateData['hasil_met'] = $hasil + $updateData->hasil_berat + $updateData->hasil_ringan;
                if ($updateData['hasil_met'] > 1500) {
                    $updateData['result_met'] = 'TINGGI';
                }
                if (600 < $updateData['hasil_met'] && $updateData['hasil_met'] <= 1500) {
                    $updateData['result_met'] = 'MENENGAH';
                }
                if (600 >= $updateData['hasil_met']) {
                    $updateData['result_met'] = 'RENDAH';
                }
            } else {
                $updateData['is_fisik_sedang'] = true;
            }
            $updateData->update();
            return redirect()->route('mulai-test', $request->id)->with('status', 'Berhasil update tes MET bagian Aktifitas Fisik sedang');
        } catch (\Throwable $e) {
            return redirect()->route('mulai-test', $request->id)->with('fail', 'Gagal update form tes MET');
        }
    }

    public function metRinganEdit(Request $request)
    {
        try {
            $updateData = TesMET::findOrFail($request->id);
            $updateData['siswa_id'] = Auth::user()->id;
            $updateData['tes_id'] = $request->id;
            $updateData['is_fisik_ringan'] = true;
            $updateData['lama_jalan'] = $request->lama;
            $hasil = 3.3 * $request->lama;
            $updateData['hasil_ringan'] = $hasil;
            $updateData['hasil_met'] = $hasil + $updateData->hasil_berat + $updateData->hasil_sedang;
            $updateData->update();
            if ($updateData['hasil_met'] > 1500) {
                $updateData['result_met'] = 'TINGGI';
            }
            if (600 < $updateData['hasil_met'] && $updateData['hasil_met'] <= 1500) {
                $updateData['result_met'] = 'MENENGAH';
            }
            if (600 >= $updateData['hasil_met']) {
                $updateData['result_met'] = 'RENDAH';
            }
            $updateData->update();
            return redirect()->route('mulai-test', $request->id)->with('status', 'Berhasil update tes MET bagian Aktifitas Fisik ringan');
        } catch (\Throwable $e) {
            return redirect()->route('mulai-test', $request->id)->with('fail', 'Berhasil gagal tes MET bagian Aktifitas Fisik ringan');
        }
    }

    public function submitTesIMTKebugaran(Request $request)
    {
        try {
            $inputResult = $request->berat / (($request->tinggi / 100) * ($request->tinggi / 100));
            $resultIMT = ResutIMT::where('gender', '=', strtoupper($request->jenis_klamin))->where('start_value', '<', $inputResult)->where('end_value', '>', $inputResult)->first();
            $inputResultKebugaran = 0.00;
            $jenis_kebugaran = "";
            if ($request->flexRadioDefault == "cooper") {
                $jenis_kebugaran = "Cooper Test";
                $detik = $request->detik_coop / 60;
                $waktu = $request->waktu_lari_coop + $detik;
                if (strtoupper($request->jenis_klamin) == "PRIA") {
                    $inputResultKebugaran = 88.02 - (0.1656 * $request->berat) - (2.76 * $waktu) + (3.3716 * 1);
                } else {
                    $inputResultKebugaran = 88.02 - (0.1656 * $request->berat) - (2.76 * $waktu) + (3.3716 * 0);
                }
            }
            if ($request->flexRadioDefault == "rookport") {
                $jenis_kebugaran = "Rockport Test";

                if (strtoupper($request->jenis_klamin) == "PRIA") {
                    $inputResultKebugaran = 132.853 - (0.0769 * $request->berat) - (0.3877 * $request->umur) + (6.315 * 1) - (3.2649 * $request->waktu_jalan) - (0.1565 * $request->denyut_nadi_setelah);
                } else {
                    $inputResultKebugaran = 132.853 - (0.0769 * $request->berat) - (0.3877 * $request->umur) + (6.315 * 0) - (3.2649 * $request->waktu_jalan) - (0.1565 * $request->denyut_nadi_setelah);
                }
            }
            $resutKebugaran = ResutKebugaran::where('jenis_klamin', '=', $request->jenis_klamin)->where('start_value', '<', $inputResultKebugaran)->where('end_value', '>', $inputResultKebugaran)->first();

            $dataInsert = $request->all();

            $dataInsert['siswa_id'] = Auth::user()->id;
            $dataInsert['tes_id'] = $request->id_tes;
            $dataInsert['berat_badan'] = $request->berat;
            $dataInsert['tinggi_badan'] = $request->tinggi;
            $dataInsert['point_imt'] = $inputResult;
            $dataInsert['result_imt'] = $resultIMT->result;

            $dataInsert['pushup'] = $request->pushup;
            $dataInsert['situp'] = $request->situp;
            $dataInsert['backup'] = $request->backup;
            $dataInsert['squatjump'] = $request->squatjump;
            $dataInsert['pullup'] = $request->pullup;

            $dataInsert['waktu_lari'] = $request->waktu_lari_coop;
            $dataInsert['waktu_jalan'] = $request->waktu_jalan;
            $dataInsert['jenis_kebugaran'] = $jenis_kebugaran;
            $dataInsert['point_kebugaran'] = $inputResultKebugaran;
            $dataInsert['result_kebugaran'] = $resutKebugaran->result;

            TesImtKebugaran::create($dataInsert);
            return redirect()->route('mulai-test', $request->id_tes)->with('status', 'Berhasil submit tes IMT, kekuatan dan kebugaran');
        } catch (\Throwable $e) {
            return redirect()->route('mulai-test', $request->id_tes)->with('fail', 'Gagal submit tes IMT, kekuatan dan kebugaran' . $e);
        }
    }
}
