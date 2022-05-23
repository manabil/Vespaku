<?php

use App\Http\Controllers\DaftarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PangkatController;
use App\Http\Controllers\PangkatUserController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JabatanUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\GraphController;
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
Route::get('/cari', [SearchController::class, 'index']);
Route::get('/cari/{user:username}', [SearchController::class, 'pegawai'])->middleware('auth');


// *=============== Graph ===============*
Route::get('/graph', [GraphController::class, 'index']);

// *=============== Profile ===============*
Route::get('/dashboard/profile/{user:username}', [ProfileController::class, 'index'])->middleware('auth');
Route::post('/dashboard/profile/update', [ProfileController::class, 'update']);


// *=============== Dashboard ============*
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/pangkat', PangkatUserController::class)->middleware('auth')->parameters(['pangkat' => 'pangkat:slug'])->except('index');
Route::resource('/dashboard/jabatan', JabatanUserController::class)->middleware('auth')->parameters(['jabatan' => 'jabatan:slug'])->except('index');


// *=============== Administrator ============*
Route::resource('/user', UserController::class)->middleware('admin')->parameters(['user' => 'user:username'])->except(['create', 'store', 'edit']);
Route::resource('/pangkat', PangkatController::class)->middleware('admin')->parameters(['pangkat' => 'pangkats:slug'])->except('show');
Route::resource('/jabatan', JabatanController::class)->middleware('admin')->parameters(['jabatan' => 'jabatans:slug'])->except('show');


// *=============== Request ============*
Route::get('/request', [RequestController::class, 'index'])->middleware('auth');
Route::post('/request/{pangkat:slug}', [RequestController::class, 'update']);
Route::post('/request/{jabatan:slug}', [RequestController::class, 'update']);

Route::get('/cari/pangkat/{pangkat:slug}/token', [RequestController::class, 'token'])->middleware('auth');
Route::get('/cari/jabatan/{jabatan:slug}/token', [RequestController::class, 'token'])->middleware('auth');

Route::post('/cari/pangkat/{pangkat:slug}/token', [RequestController::class, 'download_pangkat'])->middleware('auth');
Route::post('/cari/jabatan/{jabatan:slug}/token', [RequestController::class, 'download_jabatan'])->middleware('auth');

Route::get('/cari/pangkat/{pangkat:slug}/request', [RequestController::class, 'create'])->middleware('auth');
Route::get('/cari/jabatan/{jabatan:slug}/request', [RequestController::class, 'create'])->middleware('auth');

Route::post('/cari/pangkat/{pangkat:slug}/request', [RequestController::class, 'store'])->middleware('auth');
Route::post('/cari/jabatan/{jabatan:slug}/request', [RequestController::class, 'store'])->middleware('auth');
