<?php

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
    $data = MateriVideo::all()->first();
    return view('pages.welcome', ['data'=> $data]);
});

// Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('/');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);

Route::get('/guru', [App\Http\Controllers\Admin\GuruController::class, 'index'])->name('guru')->middleware(['auth']);
Route::get('/guru/tambah-guru', [App\Http\Controllers\Admin\GuruController::class, 'add'])->name('tambah-guru')->middleware(['auth']);
Route::post('/guru/tambah-guru', [App\Http\Controllers\Admin\GuruController::class, 'create'])->name('create-guru')->middleware(['auth']);
Route::get('/edit/{id}', [App\Http\Controllers\Admin\GuruController::class, 'editGuru'])->name('edit-guru')->middleware(['auth']);
Route::post('/delete-guru', [App\Http\Controllers\Admin\GuruController::class, 'deleteGuru'])->name('delete-guru')->middleware(['auth']);
Route::put('/guru/update-guru/{id}', [App\Http\Controllers\Admin\GuruController::class, 'updateGuru'])->name('update-guru')->middleware(['auth']);


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



