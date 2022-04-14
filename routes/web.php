<?php

use App\Http\Controllers\DaftarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PangkatController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\JabatanController;
use App\Models\Jabatan;
use App\Models\Pangkat;
use App\Models\User;
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
    $total_pegawai = User::all()->count();
    $total_jabatan = Jabatan::all()->count();
    $total_pangkat = Pangkat::all()->count();
    $total_unduh = Jabatan::all()->count();
    
    return view('home', [
        'title' => 'Home',
        'total_pegawai' => $total_pegawai,
        'total_jabatan' => $total_jabatan,
        'total_pangkat' => $total_pangkat,
        'total_unduh' => $total_unduh
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
Route::get('/cari/{username:username}', [UserController::class, 'pegawai'])->middleware('auth');
Route::get('dashboard/profile', [UserController::class, 'profile'])->middleware('auth');
Route::post('dashboard/profile', [UserController::class, 'edit'])->middleware('auth');

// *=============== Profile ============*
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/pangkat', PangkatController::class)->middleware('auth');
Route::resource('/dashboard/jabatan', JabatanController::class)->middleware('auth');

// *=============== Request ============*
Route::get('/request', [RequestController::class, 'index'])->middleware('auth');