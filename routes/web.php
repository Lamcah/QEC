<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\InstrukturController;


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
    return view('welcome');
});

Route::get('/tables', function () {
    return view('tables');


    /*=====Data Dashboard=====*/
});

Route::get('/datasiswa', function () {
    return view('data.datasiswa');
});
Route::get('/datakelas', function () {
    return view('data.datakelas');
});
Route::get('/pembayaran', function () {
    return view('data.pembayaran');
});

/*=====Data Master Dashboard=====*/
Route::get('/mastersiswa', function () {
    return view('master.mastersiswa');
});
Route::get('/masterpegawai', function () {
    return view('master.masterpegawai');
});
Route::get('/masterins', function () {
    return view('master.masterins');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index']);

//==========PEGAWAI======================//
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
// Route::get('/tambahdatapegawai', [PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('/pegawaistore', [PegawaiController::class, 'store'])->name('pegawai.store');
// Route::get('/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::put('/pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

//=========INSTRUKTUR=====================//
Route::get('/instruktur', [InstrukturController::class, 'index'])->name('instruktur.index');
Route::post('/instrukturstore', [InstrukturController::class, 'store'])->name('instruktur.store');
Route::put('/instruktur/{id}', [InstrukturController::class, 'update'])->name('instruktur.update');
Route::delete('/instruktur/{id}', [InstrukturController::class, 'destroy'])->name('instruktur.destroy');
