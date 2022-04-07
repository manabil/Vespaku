<?php

use App\Http\Controllers\DaftarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// *=============== Home Route ===============*
Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});

// *=============== Login Route ===============*
Route::get('/login', [LoginController::class, 'index']);

// *=============== Daftar Route ===============*
Route::get('/daftar', [DaftarController::class, 'index']);
Route::post('/daftar', [DaftarController::class, 'store']);

// *=============== Cari ===============*
Route::get('/cari', [PegawaiController::class, 'cari']);


// *=============== Profile ============*
Route::get('/cari/{username:username}', [PegawaiController::class, 'pegawai']);