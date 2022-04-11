<?php

use App\Http\Controllers\DaftarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PangkatController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\JabatanController;
use GuzzleHttp\Middleware;

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
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);	

// *=============== Daftar Route ===============*
Route::get('/daftar', [DaftarController::class, 'index'])->middleware('guest');
Route::post('/daftar', [DaftarController::class, 'add']);

// *=============== Cari ===============*
Route::get('/cari', [UserController::class, 'cari']);


// *=============== Pegawai Details ============*
Route::get('/cari/{username:username}', [UserController::class, 'pegawai'])->middleware('auth');


// *=============== Profile ============*
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/pangkat', PangkatController::class)->middleware('auth');
Route::resource('/dashboard/jabatan', JabatanController::class)->middleware('auth');

// *=============== Request ============*
Route::get('/request', [RequestController::class, 'index'])->middleware('auth');