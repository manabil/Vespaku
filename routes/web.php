<?php

use App\Http\Controllers\PegawaiController;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Route;

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
Route::get('/login', function () {
    return view('login', [
        'title' => 'Login'
    ]);
});

// *=============== Daftar Route ===============*
Route::get('/daftar', function () {
    return view('daftar', [
        'title' => 'Daftar'
    ]);
});

// *=============== Cari ===============*
Route::get('/cari', [PegawaiController::class, 'cari']);


// *=============== Profile ===============*
Route::get('/cari/{slug:slug}', [PegawaiController::class, 'pegawai']);