<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


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
Route::get('/datapegawai', function () {
    return view('data.datapegawai');
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
