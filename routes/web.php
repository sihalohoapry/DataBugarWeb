<?php

use App\Http\Controllers\Guru\SiswaController;
use App\Models\MateriVideo;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $serve = MateriVideo::all();
    return view('pages.welcome', ['serve' => $serve]);
});



// Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('/');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home')->middleware(['auth']);
Route::get('/dashboard', [App\Http\Controllers\Controller::class, 'home'])->name('dashboard')->middleware(['auth']);


Route::post('/submit-freetes', [App\Http\Controllers\Admin\FreeTesController::class, 'submitFreetes'])->name('submit-freetes');

//ADMIN
Route::get('/guru', [App\Http\Controllers\Admin\GuruController::class, 'index'])->name('guru')->middleware(['auth', 'admin']);
Route::get('/guru/tambah-guru', [App\Http\Controllers\Admin\GuruController::class, 'add'])->name('tambah-guru')->middleware(['auth', 'admin']);
Route::post('/guru/tambah-guru', [App\Http\Controllers\Admin\GuruController::class, 'create'])->name('create-guru')->middleware(['auth', 'admin']);
Route::get('/edit-guru/{id}', [App\Http\Controllers\Admin\GuruController::class, 'editGuru'])->name('edit-guru')->middleware(['auth', 'admin']);
Route::post('/delete-guru', [App\Http\Controllers\Admin\GuruController::class, 'deleteGuru'])->name('delete-guru')->middleware(['auth', 'admin']);
Route::put('/guru/update-guru/{id}', [App\Http\Controllers\Admin\GuruController::class, 'updateGuru'])->name('update-guru')->middleware(['auth', 'admin']);
Route::get('/sekolah', [App\Http\Controllers\Admin\SekolahController::class, 'index'])->name('sekolah')->middleware(['auth', 'admin']);
Route::get('/sekolah/tambah-sekolah', [App\Http\Controllers\Admin\SekolahController::class, 'add'])->name('tambah-sekolah')->middleware(['auth', 'admin']);
Route::post('/sekolah/tambah-sekolah', [App\Http\Controllers\Admin\SekolahController::class, 'create'])->name('create-sekolah')->middleware(['auth', 'admin']);
Route::post('/sekolah/delete-sekolah', [App\Http\Controllers\Admin\SekolahController::class, 'delete'])->name('delete-sekolah')->middleware(['auth', 'admin']);
Route::post('/sekolah/update-sekolah', [App\Http\Controllers\Admin\SekolahController::class, 'updatesekolah'])->name('update-sekolah')->middleware(['auth', 'admin']);

Route::get('/tahun-ajaran', [App\Http\Controllers\Admin\SekolahController::class, 'indexTahun'])->name('tahun-ajaran')->middleware(['auth', 'admin']);
Route::post('/tahun-ajaran/tambah-tahun-ajaran', [App\Http\Controllers\Admin\SekolahController::class, 'createTahun'])->name('create-tahun-ajaran')->middleware(['auth', 'admin']);
Route::post('/tahun-ajaran/delete-tahun-ajaran', [App\Http\Controllers\Admin\SekolahController::class, 'deleteTahun'])->name('delete-tahun-ajaran')->middleware(['auth', 'admin']);
Route::post('/tahun-ajaran/update-tahun-ajaran', [App\Http\Controllers\Admin\SekolahController::class, 'updateTahun'])->name('update-tahun-ajaran')->middleware(['auth', 'admin']);


//guru
Route::get('/siswa', [App\Http\Controllers\Guru\SiswaController::class, 'index'])->name('siswa')->middleware(['auth', 'guru']);
Route::get('/siswa/tambah-siswa', [App\Http\Controllers\Guru\SiswaController::class, 'add'])->name('tambah-siswa')->middleware(['auth', 'guru']);
Route::post('/siswa/tambah-siswa', [App\Http\Controllers\Guru\SiswaController::class, 'createSiswa'])->name('create-siswa')->middleware(['auth', 'guru']);
Route::post('/siswa/upload-siswa', [App\Http\Controllers\Guru\SiswaController::class, 'uploadSiswa'])->name('upload-siswa')->middleware(['auth', 'guru']);
Route::post('/delete-siswa', [App\Http\Controllers\Guru\SiswaController::class, 'deleteSiswa'])->name('delete-siswa')->middleware(['auth', 'guru']);
Route::post('/update-siswa', [App\Http\Controllers\Guru\SiswaController::class, 'updateSiswa'])->name('update-siswa')->middleware(['auth', 'guru']);
Route::get('/siswa/detail-siswa/{id}', [App\Http\Controllers\Guru\SiswaController::class, 'detailSiswa'])->name('detail-siswa')->middleware(['auth', 'guru']);
Route::get('/sistem/download', [App\Http\Controllers\Guru\SiswaController::class, 'downloadTemplate'])->name('download')->middleware(['auth', 'guru']);



Route::get('/jadwal-tes', [App\Http\Controllers\Guru\JadwalTesController::class, 'index'])->name('jadwal-tes')->middleware(['auth', 'guru']);
Route::get('/jadwal-tes/detail-tes/{id}', [App\Http\Controllers\Guru\JadwalTesController::class, 'detailTes'])->name('detail-tes')->middleware(['auth', 'guru']);
Route::post('/update-jadwal', [App\Http\Controllers\Guru\JadwalTesController::class, 'detailTes'])->name('update-jadwal')->middleware(['auth']);
Route::post('/jadwal-tes/tambah-jadwal', [App\Http\Controllers\Guru\JadwalTesController::class, 'createJadwal'])->name('tambah-jadwal')->middleware(['auth', 'guru']);
Route::post('/delete-jadwal', [App\Http\Controllers\Guru\JadwalTesController::class, 'deleteJadwal'])->name('delete-jadwal')->middleware(['auth', 'guru']);
Route::post('/report-tes/{id}', [App\Http\Controllers\Guru\JadwalTesController::class, 'export'])->name('report-tes')->middleware(['auth', 'guru']);
Route::post('/report-tes-met/{id}', [App\Http\Controllers\Guru\JadwalTesController::class, 'exportMET'])->name('report-tes-met')->middleware(['auth', 'guru']);

Route::get('/kelas', [App\Http\Controllers\Admin\KelasController::class, 'index'])->name('kelas')->middleware(['auth', 'guru']);
Route::get('/kelas/tambah-kelas', [App\Http\Controllers\Admin\KelasController::class, 'add'])->name('tambah-kelas')->middleware(['auth', 'guru']);
Route::post('/kelas/tambah-kelas', [App\Http\Controllers\Admin\KelasController::class, 'create'])->name('create')->middleware(['auth', 'guru']);
Route::post('/kelas/delete-kelas', [App\Http\Controllers\Admin\KelasController::class, 'delete'])->name('delete-kelas')->middleware(['auth', 'guru']);
Route::post('/kelas/update-kelas', [App\Http\Controllers\Admin\KelasController::class, 'updateKelas'])->name('update-kelas')->middleware(['auth', 'guru']);




//siswa
Route::get('/jadwal-tes-siswa', [App\Http\Controllers\Siswa\SiswaController::class, 'indexJadwal'])->name('jadwal-tes-siswa')->middleware(['auth']);
Route::get('/jadwal-tes-siswa/mulai-test/{id}', [App\Http\Controllers\Siswa\SiswaController::class, 'mulaiTest'])->name('mulai-test')->middleware(['auth']);
Route::get('/jadwal-tes-siswa/detail-result-tes/{id}', [App\Http\Controllers\Siswa\SiswaController::class, 'detailResultTest'])->name('detail-result-tes')->middleware(['auth']);

Route::post('/met-berat', [App\Http\Controllers\Siswa\SiswaController::class, 'metBerat'])->name('met-berat')->middleware(['auth']);
Route::post('/met-berat-edit', [App\Http\Controllers\Siswa\SiswaController::class, 'metBeratEdit'])->name('met-berat-edit')->middleware(['auth']);
Route::post('/met-sedang', [App\Http\Controllers\Siswa\SiswaController::class, 'metSedang'])->name('met-sedang')->middleware(['auth']);
Route::post('/met-sedang-edit', [App\Http\Controllers\Siswa\SiswaController::class, 'metSedangEdit'])->name('met-sedang-edit')->middleware(['auth']);
Route::post('/met-ringan', [App\Http\Controllers\Siswa\SiswaController::class, 'metRingan'])->name('met-ringan')->middleware(['auth']);
Route::post('/met-ringan-edit', [App\Http\Controllers\Siswa\SiswaController::class, 'metRinganEdit'])->name('met-ringan-edit')->middleware(['auth']);
Route::post('/submit-tes', [App\Http\Controllers\Siswa\SiswaController::class, 'submitTesIMTKebugaran'])->name('submit-tes');


Route::get('/tes-mandiri-siswa', [App\Http\Controllers\Siswa\SiswaController::class, 'indexMandiri'])->name('tes-mandiri-siswa')->middleware(['auth']);
Route::get('/tes-mandiri-siswa/form-tes-mandiri', [App\Http\Controllers\Siswa\SiswaController::class, 'formTesMandiri'])->name('form-tes-mandiri')->middleware(['auth']);
Route::post('/submit-tes-mandiri', [App\Http\Controllers\Siswa\SiswaController::class, 'submitTesIMTKebugaranMandiri'])->name('submit-tes-mandiri');

Route::get('/raport-ku', [App\Http\Controllers\Siswa\SiswaController::class, 'raportKu'])->name('raport-ku')->middleware(['auth']);
Route::get('/riwayat-kesehatan', [App\Http\Controllers\Siswa\SiswaController::class, 'riwayatKesehatan'])->name('riwayat-kesehatan')->middleware(['auth']);
Route::post('/submit-riwayat-dokter', [App\Http\Controllers\Siswa\SiswaController::class, 'submitRiwayatDokter'])->name('submit-riwayat-dokter');
Route::post('/edit-riwayat-dokter', [App\Http\Controllers\Siswa\SiswaController::class, 'editRiwayatDokter'])->name('edit-riwayat-dokter');

Route::post('/submit-sejarah-keluarga', [App\Http\Controllers\Siswa\SiswaController::class, 'submitSejarahKeluarga'])->name('submit-sejarah-keluarga');
Route::post('/edit-sejarah-keluarga', [App\Http\Controllers\Siswa\SiswaController::class, 'editSejarahKeluarga'])->name('edit-sejarah-keluarga');

Route::post('/submit-kondisi-sekarang', [App\Http\Controllers\Siswa\SiswaController::class, 'submitKondisiSekarang'])->name('submit-kondisi-sekarang');
Route::post('/edit-kondisi-sekarang', [App\Http\Controllers\Siswa\SiswaController::class, 'editKondisiSekarang'])->name('edit-kondisi-sekarang');


Route::post('/submit-permasalahan-medis', [App\Http\Controllers\Siswa\SiswaController::class, 'submitPermasalahanMedis'])->name('submit-permasalahan-medis');
Route::post('/edit-permasalahan-medis', [App\Http\Controllers\Siswa\SiswaController::class, 'editPermasalahanMedis'])->name('edit-permasalahan-medis');

Route::post('/submit-konsumsi-obat', [App\Http\Controllers\Siswa\SiswaController::class, 'submitKonsumsiObat'])->name('submit-konsumsi-obat');
Route::post('/edit-konsumsi-obat', [App\Http\Controllers\Siswa\SiswaController::class, 'editKonsumsiObat'])->name('edit-konsumsi-obat');

Route::post('/submit-pola-tidur', [App\Http\Controllers\Siswa\SiswaController::class, 'submitPolaTidur'])->name('submit-pola-tidur');
Route::post('/edit-pola-tidur', [App\Http\Controllers\Siswa\SiswaController::class, 'editPolaTidur'])->name('edit-pola-tidur');


Route::get('/result-imt', [App\Http\Controllers\Admin\ResultController::class, 'index'])->name('result-imt')->middleware(['auth']);
Route::get('/result-imt/tambah-result-imt', [App\Http\Controllers\Admin\ResultController::class, 'add'])->name('tambah-result-imt')->middleware(['auth']);
Route::post('/result-imt/tambah-result-imt', [App\Http\Controllers\Admin\ResultController::class, 'createIMT'])->name('create-result-imt')->middleware(['auth']);
Route::get('/edit/{id}', [App\Http\Controllers\Admin\ResultController::class, 'editresultIMT'])->name('edit-result-imt')->middleware(['auth']);
Route::post('/delete-result-imt', [App\Http\Controllers\Admin\ResultController::class, 'deleteresultIMT'])->name('delete-result-imt')->middleware(['auth']);
Route::post('/result-imt/update-result-imt', [App\Http\Controllers\Admin\ResultController::class, 'updateresultIMT'])->name('update-result-imt')->middleware(['auth']);

Route::get('/result-kebugaran', [App\Http\Controllers\Admin\KebugaranController::class, 'index'])->name('result-kebugaran')->middleware(['auth']);
Route::get('/result-kebugaran/tambah-result-kebugaran', [App\Http\Controllers\Admin\KebugaranController::class, 'add'])->name('tambah-result-kebugaran')->middleware(['auth']);
Route::post('/result-kebugaran/tambah-result-kebugaran', [App\Http\Controllers\Admin\KebugaranController::class, 'createkebugaran'])->name('create-result-kebugaran')->middleware(['auth']);
Route::get('/edit/{id}', [App\Http\Controllers\Admin\KebugaranController::class, 'editresultkebugaran'])->name('edit-result-kebugaran')->middleware(['auth']);
Route::post('/delete-result-kebugaran', [App\Http\Controllers\Admin\KebugaranController::class, 'deleteresultkebugaran'])->name('delete-result-kebugaran')->middleware(['auth']);
Route::post('/result-kebugaran/update-result-kebugaran', [App\Http\Controllers\Admin\KebugaranController::class, 'updateresultkebugaran'])->name('update-result-kebugaran')->middleware(['auth']);


Route::get('/materi', [App\Http\Controllers\Admin\MateriController::class, 'index'])->name('materi')->middleware(['auth']);
Route::get('/materi/tambah-materi', [App\Http\Controllers\Admin\MateriController::class, 'add'])->name('tambah-materi')->middleware(['auth']);
Route::post('/materi/tambah-materi', [App\Http\Controllers\Admin\MateriController::class, 'create'])->name('create-materi')->middleware(['auth']);
Route::get('materi/edit/{id}', [App\Http\Controllers\Admin\MateriController::class, 'editmateri'])->name('edit-materi')->middleware(['auth']);
Route::post('/delete-materi', [App\Http\Controllers\Admin\MateriController::class, 'deletemateri'])->name('delete-materi')->middleware(['auth']);
Route::put('/materi/update-materi/{id}', [App\Http\Controllers\Admin\MateriController::class, 'updatemateri'])->name('update-materi')->middleware(['auth']);
