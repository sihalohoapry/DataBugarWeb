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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);

Route::post('/submit-freetes', [App\Http\Controllers\Admin\FreeTesController::class, 'submitFreetes'])->name('submit-freetes');

Route::get('/guru', [App\Http\Controllers\Admin\GuruController::class, 'index'])->name('guru')->middleware(['auth']);
Route::get('/guru/tambah-guru', [App\Http\Controllers\Admin\GuruController::class, 'add'])->name('tambah-guru')->middleware(['auth']);
Route::post('/guru/tambah-guru', [App\Http\Controllers\Admin\GuruController::class, 'create'])->name('create-guru')->middleware(['auth']);
Route::get('/edit-guru/{id}', [App\Http\Controllers\Admin\GuruController::class, 'editGuru'])->name('edit-guru')->middleware(['auth']);
Route::post('/delete-guru', [App\Http\Controllers\Admin\GuruController::class, 'deleteGuru'])->name('delete-guru')->middleware(['auth']);
Route::put('/guru/update-guru/{id}', [App\Http\Controllers\Admin\GuruController::class, 'updateGuru'])->name('update-guru')->middleware(['auth']);


//guru
Route::get('/siswa', [App\Http\Controllers\Guru\SiswaController::class, 'index'])->name('siswa')->middleware(['auth']);
Route::get('/siswa/tambah-siswa', [App\Http\Controllers\Guru\SiswaController::class, 'add'])->name('tambah-siswa')->middleware(['auth']);
Route::post('/siswa/tambah-siswa', [App\Http\Controllers\Guru\SiswaController::class, 'createSiswa'])->name('create-siswa')->middleware(['auth']);
Route::post('/siswa/upload-siswa', [App\Http\Controllers\Guru\SiswaController::class, 'uploadSiswa'])->name('upload-siswa')->middleware(['auth']);
Route::post('/delete-siswa', [App\Http\Controllers\Guru\SiswaController::class, 'deleteSiswa'])->name('delete-siswa')->middleware(['auth']);
Route::post('/update-siswa', [App\Http\Controllers\Guru\SiswaController::class, 'updateSiswa'])->name('update-siswa')->middleware(['auth']);
Route::get('/siswa/detail-siswa/{id}', [App\Http\Controllers\Guru\SiswaController::class, 'detailSiswa'])->name('detail-siswa')->middleware(['auth']);
Route::get('/sistem/download', [SiswaController::class, 'downloadTemplate'])->name('download')->middleware(['auth']);


Route::get('/jadwal-tes', [App\Http\Controllers\Guru\JadwalTesController::class, 'index'])->name('jadwal-tes')->middleware(['auth']);
Route::post('/update-jadwal', [App\Http\Controllers\Guru\JadwalTesController::class, 'updateJadwal'])->name('update-jadwal')->middleware(['auth']);
Route::post('/jadwal-tes/tambah-jadwal', [App\Http\Controllers\Guru\JadwalTesController::class, 'createJadwal'])->name('tambah-jadwal')->middleware(['auth']);
Route::post('/delete-jadwal', [App\Http\Controllers\Guru\JadwalTesController::class, 'deleteJadwal'])->name('delete-jadwal')->middleware(['auth']);



//siswa
Route::get('/jadwal-tes-siswa', [App\Http\Controllers\Siswa\SiswaController::class, 'indexJadwal'])->name('jadwal-tes-siswa')->middleware(['auth']);
Route::get('/mulai-test/{id}', [App\Http\Controllers\Siswa\SiswaController::class, 'mulaiTest'])->name('mulai-test')->middleware(['auth']);
Route::post('/met-berat', [App\Http\Controllers\Siswa\SiswaController::class, 'metBerat'])->name('met-berat')->middleware(['auth']);
Route::post('/met-sedang', [App\Http\Controllers\Siswa\SiswaController::class, 'metSedang'])->name('met-sedang')->middleware(['auth']);
Route::post('/met-ringan', [App\Http\Controllers\Siswa\SiswaController::class, 'metRingan'])->name('met-ringan')->middleware(['auth']);









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

Route::get('/kelas', [App\Http\Controllers\Admin\KelasController::class, 'index'])->name('kelas')->middleware(['auth']);
Route::get('/kelas/tambah-kelas', [App\Http\Controllers\Admin\KelasController::class, 'add'])->name('tambah-kelas')->middleware(['auth']);
Route::post('/kelas/tambah-kelas', [App\Http\Controllers\Admin\KelasController::class, 'create'])->name('create')->middleware(['auth']);
Route::post('/kelas/delete-kelas', [App\Http\Controllers\Admin\KelasController::class, 'delete'])->name('delete-kelas')->middleware(['auth']);
Route::post('/kelas/update-kelas', [App\Http\Controllers\Admin\KelasController::class, 'updateKelas'])->name('update-kelas')->middleware(['auth']);

Route::get('/sekolah', [App\Http\Controllers\Admin\SekolahController::class, 'index'])->name('sekolah')->middleware(['auth']);
Route::get('/sekolah/tambah-sekolah', [App\Http\Controllers\Admin\SekolahController::class, 'add'])->name('tambah-sekolah')->middleware(['auth']);
Route::post('/sekolah/tambah-sekolah', [App\Http\Controllers\Admin\SekolahController::class, 'create'])->name('create-sekolah')->middleware(['auth']);
Route::post('/sekolah/delete-sekolah', [App\Http\Controllers\Admin\SekolahController::class, 'delete'])->name('delete-sekolah')->middleware(['auth']);
Route::post('/sekolah/update-sekolah', [App\Http\Controllers\Admin\SekolahController::class, 'updatesekolah'])->name('update-sekolah')->middleware(['auth']);
