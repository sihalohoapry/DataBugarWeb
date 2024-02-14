<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\DokterKeluarga;
use App\Models\JadwalTest;
use App\Models\KondisiSekarang;
use App\Models\KonsumsiObat;
use App\Models\MateriVideo;
use App\Models\PenyakitKeluarga;
use App\Models\PenyakitSekarang;
use App\Models\PermasalahanMedisTerakhir;
use App\Models\PolaTidur;
use App\Models\ResutIMT;
use App\Models\ResutKebugaran;
use App\Models\SejarahKeluarga;
use App\Models\TesImtKebugaran;
use App\Models\TesMandiriSiswa;
use App\Models\TesMET;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use PhpParser\Node\Stmt\TryCatch;

class SiswaController extends Controller
{
    public function indexJadwal()
    {

        $datas = JadwalTest::join('tes_imt_kebugarans', 'jadwal_tests.id', '=', 'tes_imt_kebugarans.tes_id')
            ->join('tes_m_e_t_s', 'jadwal_tests.id', 'tes_m_e_t_s.tes_id')
            ->where('sekolah_id', '=', Auth::user()->sekolah_id)
            ->where('class_id', '=', Auth::user()->class)->get();

        return view('pages.siswa.jadwal-tes', ['datas' => $datas]);
    }

    public function indexMandiri()
    {

        $datas = TesMandiriSiswa::where('siswa_id', '=', Auth::user()->id)->get();
        return view('pages.siswa.tes-mandiri', ['datas' => $datas,]);
    }

    public function formTesMandiri()
    {
        $serve = null;
        if (strtoupper(Auth::user()->gender) == 'WANITA') {
            $serve = MateriVideo::whereNotIn('judul', ['PULL UP'])->get();
        } else {
            $serve = MateriVideo::whereNotIn('judul', ['PULL UP WANITA'])->get();
        }

        return view('pages.siswa.form-tes-mandiri', ['serve' => $serve]);
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

    public function detailResultTest($id)
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

        return view('pages.siswa.detail-tes-siswa', ['tes' => $tes, 'dataMET' => $dataMET, 'serve' => $serve, 'hasilTesIMTKebugaran' => $hasilTesIMTKebugaran]);
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

    public function submitTesIMTKebugaranMandiri(Request $request)
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

            TesMandiriSiswa::create($dataInsert);
            return redirect()->route('tes-mandiri-siswa')->with('status', 'Berhasil submit tes mandiri IMT, kekuatan dan kebugaran');
        } catch (\Throwable $e) {
            return redirect()->route('tes-mandiri-siswa')->with('fail', 'Gagal submit tes mandiri IMT, kekuatan dan kebugaran' . $e);
        }
    }

    public function raportKu()
    {
        $datas = JadwalTest::join('tes_imt_kebugarans', 'jadwal_tests.id', '=', 'tes_imt_kebugarans.tes_id')
            ->join('tes_m_e_t_s', 'jadwal_tests.id', 'tes_m_e_t_s.tes_id')
            ->where('sekolah_id', '=', Auth::user()->sekolah_id)
            ->where('class_id', '=', Auth::user()->class)
            ->where('tes_imt_kebugarans.siswa_id', '=', Auth::user()->id)
            ->where('tes_m_e_t_s.siswa_id', '=', Auth::user()->id)
            ->get();
        return view('pages.siswa.raport-ku', ['datas' => $datas]);
    }

    public function riwayatKesehatan()
    {
        $dataPenyakitKeluarga = null;
        $dataPenyakitSekarang = null;

        $dataDokter = DokterKeluarga::where('siswa_id', '=', Auth::user()->id)->first();
        $dataSejarahKeluarga = SejarahKeluarga::where('siswa_id', '=', Auth::user()->id)->first();
        if ($dataSejarahKeluarga != null) {
            $dataPenyakitKeluarga = PenyakitKeluarga::where('sejarah_keluarga_id', '=', $dataSejarahKeluarga->id)->get();
        }
        $kondisSekarang = KondisiSekarang::where('siswa_id', '=', Auth::user()->id)->first();
        if ($kondisSekarang != null) {
            $dataPenyakitSekarang = PenyakitSekarang::where('kondisi_sekarang_id', '=', $kondisSekarang->id)->get();
        }
        $permasalahMedisTerakhir = PermasalahanMedisTerakhir::where('siswa_id', '=', Auth::user()->id)->get();
        $konsumsiObat = KonsumsiObat::where('siswa_id', '=', Auth::user()->id)->get();
        $polaTidur = PolaTidur::where('siswa_id', '=', Auth::user()->id)->first();


        // dd($permasalahMedisTerakhir);
        return view('pages.siswa.riwayat-kesehatan', [
            'dataDokter' => $dataDokter,
            'dataSejarahKeluarga' => $dataSejarahKeluarga,
            'dataPenyakitKeluarga' => $dataPenyakitKeluarga,
            'kondisSekarang' => $kondisSekarang,
            'dataPenyakitSekarang' => $dataPenyakitSekarang,
            'permasalahMedisTerakhir' => $permasalahMedisTerakhir,
            'konsumsiObat' => $konsumsiObat,
            'polaTidur' => $polaTidur,

        ]);
    }


    public function submitRiwayatDokter(Request $request)
    {
        try {
            $data = $request->all();
            $data['siswa_id'] = Auth::user()->id;
            DokterKeluarga::create($data);
            return redirect()->route('riwayat-kesehatan')->with('status', 'Berhasil menmabahkan riwayat');
        } catch (\Throwable $e) {
            return redirect()->route('riwayat-kesehatan')->with('fail', 'Gagal menmabahkan riwayat');
        }
    }

    public function editRiwayatDokter(Request $request)
    {
        try {
            $dataEdit = DokterKeluarga::findOrFail($request->id);
            $dataEdit['siswa_id'] = Auth::user()->id;
            $dataEdit['nama_dokter'] = $request->nama_dokter;
            $dataEdit['alamat_praktek'] = $request->alamat_praktek;
            $dataEdit['no_telpon'] = $request->no_telpon;
            $dataEdit['terakhir_checkup'] = $request->terakhir_checkup;

            $dataEdit->update();
            return redirect()->route('riwayat-kesehatan')->with('status', 'Berhasil edit riwayat');
        } catch (\Throwable $e) {
            return redirect()->route('riwayat-kesehatan')->with('fail', 'Gagal edit riwayat' . $e);
        }
    }

    public function submitSejarahKeluarga(Request $request)
    {
        try {
            $data = $request->all();
            $data['siswa_id'] = Auth::user()->id;
            SejarahKeluarga::create($data);

            $sejarahId = SejarahKeluarga::where('siswa_id', '=', Auth::user()->id)->first();
            foreach ($request->penyakit_keluarga as $item) {
                if ($item == null) {
                    continue;
                }
                $dataPenyakitKeluarga = null;
                $dataPenyakitKeluarga['sejarah_keluarga_id'] = $sejarahId->id;
                $dataPenyakitKeluarga['nama_penyakit'] = $item;
                PenyakitKeluarga::create($dataPenyakitKeluarga);
            }
            return redirect()->route('riwayat-kesehatan')->with('status', 'Berhasil menmabahkan riwayat');
        } catch (\Throwable $e) {
            return redirect()->route('riwayat-kesehatan')->with('fail', 'Gagal menmabahkan riwayat' . $e);
        }
    }

    public function editSejarahKeluarga(Request $request)
    {
        try {
            $dataEdit = SejarahKeluarga::findOrFail($request->keluarga_id);
            $dataEdit['masalah_kesehatan_kk'] =  $request->masalah_kesehatan_kk;
            $dataEdit['meninggal_under_50'] =  $request->meninggal_under_50;
            $dataEdit['deskripsi_penyebab_meninggal'] =  $request->deskripsi_penyebab_meninggal;

            $dataEdit->update();


            PenyakitKeluarga::where('sejarah_keluarga_id', $request->keluarga_id)->delete();

            $dataPenyakitKeluarga = null;
            foreach ($request->penyakit_keluarga as $item) {
                $dataPenyakitKeluarga['sejarah_keluarga_id'] = $request->keluarga_id;
                $dataPenyakitKeluarga['nama_penyakit'] = $item;
                PenyakitKeluarga::create($dataPenyakitKeluarga);
            }
            return redirect()->route('riwayat-kesehatan')->with('status', 'Berhasil edit riwayat');
        } catch (\Throwable $e) {
            return redirect()->route('riwayat-kesehatan')->with('fail', 'Gagal edit riwayat' . $e);
        }
    }

    public function submitKondisiSekarang(Request $request)
    {
        try {
            $data = $request->all();
            $data['siswa_id'] = Auth::user()->id;
            $data['result_berat'] = $request->berat_sekarang - $request->berat_lalu;
            $data['result_tinggi'] = $request->tinggi_sekarang - $request->tinggi_lalu;

            KondisiSekarang::create($data);

            $kondisiId = KondisiSekarang::where('siswa_id', '=', Auth::user()->id)->first();
            foreach ($request->penyakit_sekarang as $item) {
                if ($item == null) {
                    continue;
                }
                $dataPenyakitSekarang = null;
                $dataPenyakitSekarang['kondisi_sekarang_id'] = $kondisiId->id;
                $dataPenyakitSekarang['penyakit_sekarang'] = $item;
                PenyakitSekarang::create($dataPenyakitSekarang);
            }
            return redirect()->route('riwayat-kesehatan')->with('status', 'Berhasil menmabahkan riwayat');
        } catch (\Throwable $e) {
            return redirect()->route('riwayat-kesehatan')->with('fail', 'Gagal menmabahkan riwayat' . $e);
        }
    }

    public function editKondisiSekarang(Request $request)
    {
        try {
            $dataEdit = KondisiSekarang::findOrFail($request->kondisi_sekarang_id);
            $dataEdit['berat_lalu'] =  $request->berat_lalu;
            $dataEdit['berat_sekarang'] =  $request->berat_sekarang;
            $dataEdit['tinggi_lalu'] =  $request->tinggi_lalu;
            $dataEdit['tinggi_sekarang'] =  $request->tinggi_sekarang;
            $dataEdit['result_tinggi'] = $request->tinggi_sekarang - $request->tinggi_lalu;
            $dataEdit['result_berat'] = $request->berat_sekarang - $request->berat_lalu;

            $dataEdit->update();


            PenyakitSekarang::where('kondisi_sekarang_id', $request->kondisi_sekarang_id)->delete();

            $dataPenyakitSekarang = null;
            foreach ($request->penyakit_sekarang as $item) {
                $dataPenyakitSekarang['kondisi_sekarang_id'] = $request->kondisi_sekarang_id;
                $dataPenyakitSekarang['penyakit_sekarang'] = $item;
                PenyakitSekarang::create($dataPenyakitSekarang);
            }
            return redirect()->route('riwayat-kesehatan')->with('status', 'Berhasil edit riwayat');
        } catch (\Throwable $e) {
            return redirect()->route('riwayat-kesehatan')->with('fail', 'Gagal edit riwayat' . $e);
        }
    }


    public function submitPermasalahanMedis(Request $request)
    {
        // dd($request->all());

        try {

            foreach ($request->nama_permasalahan_medis as $item) {
                if ($item == null) {
                    continue;
                }
                $permasalahanSekaraang = null;
                $permasalahanSekaraang['siswa_id'] = Auth::user()->id;
                $permasalahanSekaraang['nama_permasalahan_medis'] = $item;
                PermasalahanMedisTerakhir::create($permasalahanSekaraang);
            }
            return redirect()->route('riwayat-kesehatan')->with('status', 'Berhasil menmabahkan riwayat');
        } catch (\Throwable $e) {
            return redirect()->route('riwayat-kesehatan')->with('fail', 'Gagal menmabahkan riwayat' . $e);
        }
    }

    public function editPermasalahanMedis(Request $request)
    {
        try {
            PermasalahanMedisTerakhir::where('siswa_id', Auth::user()->id)->delete();

            $permasalahanMedisTerakhir = null;
            foreach ($request->nama_permasalahan_medis as $item) {
                if ($item == null) {
                    continue;
                }
                $permasalahanMedisTerakhir['siswa_id'] = Auth::user()->id;
                $permasalahanMedisTerakhir['nama_permasalahan_medis'] = $item;
                PermasalahanMedisTerakhir::create($permasalahanMedisTerakhir);
            }
            return redirect()->route('riwayat-kesehatan')->with('status', 'Berhasil edit riwayat');
        } catch (\Throwable $e) {
            return redirect()->route('riwayat-kesehatan')->with('fail', 'Gagal edit riwayat' . $e);
        }
    }

    public function submitKonsumsiObat(Request $request)
    {
        try {

            foreach ($request->kosumsi_obat as $item) {
                if ($item == null) {
                    continue;
                }
                $kosumsiObat = null;
                $kosumsiObat['siswa_id'] = Auth::user()->id;
                $kosumsiObat['value'] = $item;
                KonsumsiObat::create($kosumsiObat);
            }
            return redirect()->route('riwayat-kesehatan')->with('status', 'Berhasil menmabahkan riwayat');
        } catch (\Throwable $e) {
            return redirect()->route('riwayat-kesehatan')->with('fail', 'Gagal menmabahkan riwayat' . $e);
        }
    }

    public function editKonsumsiObat(Request $request)
    {
        try {
            KonsumsiObat::where('siswa_id', Auth::user()->id)->delete();

            $kosumsiObat = null;
            foreach ($request->kosumsi_obat as $item) {
                if ($item == null) {
                    continue;
                }
                $kosumsiObat['siswa_id'] = Auth::user()->id;
                $kosumsiObat['value'] = $item;
                KonsumsiObat::create($kosumsiObat);
            }
            return redirect()->route('riwayat-kesehatan')->with('status', 'Berhasil edit riwayat');
        } catch (\Throwable $e) {
            return redirect()->route('riwayat-kesehatan')->with('fail', 'Gagal edit riwayat' . $e);
        }
    }

    public function submitPolaTidur(Request $request)
    {
        try {
            $data = $request->all();
            $data['siswa_id'] = Auth::user()->id;
            PolaTidur::create($data);

            return redirect()->route('riwayat-kesehatan')->with('status', 'Berhasil menmabahkan riwayat');
        } catch (\Throwable $e) {
            return redirect()->route('riwayat-kesehatan')->with('fail', 'Gagal menmabahkan riwayat' . $e);
        }
    }

    public function editPolaTidur(Request $request)
    {
        try {
            $dataEdit = PolaTidur::findOrFail($request->pola_tidur_id);

            $dataEdit['siswa_id'] = Auth::user()->id;
            $dataEdit['jam_tidur'] = $request->jam_tidur;
            $dataEdit['jam_bangun'] = $request->jam_bangun;
            $dataEdit['durasi_tidur'] = $request->durasi_tidur;

            $dataEdit->update();
            return redirect()->route('riwayat-kesehatan')->with('status', 'Berhasil edit riwayat');
        } catch (\Throwable $e) {
            return redirect()->route('riwayat-kesehatan')->with('fail', 'Gagal edit riwayat' . $e);
        }
    }
}
