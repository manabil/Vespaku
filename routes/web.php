<?php

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

Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/login', function () {
    return view('login', [
        'title' => 'Login'
    ]);
});

Route::get('/daftar', function () {
    return view('daftar', [
        'title' => 'Daftar'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About'
    ]);
});

Route::get('/cari', function () {
    return view('cari', [
        'title' => 'Cari Pegawai'
    ]);
});
