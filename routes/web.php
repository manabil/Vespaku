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

Route::get('/cari', function () {
    $list_pegawai = [
        [
            'nama' => 'Rizki',
            'slug' => 'rizki',	
            'jabatan' => 'Analisis Pengelolaan Keuangan APBN Ahli Pertama',
            'jenis_jabatan' => 'Administrator',
            'nip' => '19920926207105568'
        ],
        [
            'nama' => 'Dodi',
            'slug' => 'dodi',	
            'jabatan' => 'Analisis Pengelolaan Keuangan APBN Ahli Kedua',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568'
        ],
        [
            'nama' => 'Cecep',
            'slug' => 'cecep',
            'jabatan' => 'Tata Usaha',
            'jenis_jabatan' => 'Fungsional',
            'nip' => '19920926207105568'
        ],
        [
            'nama' => 'Martha',
            'slug' => 'martha',
            'jabatan' => 'Bendahara Pengeluaran',
            'jenis_jabatan' => 'Fungsional',
            'nip' => '19920926207105568'
        ],
        [
            'nama' => 'Jordi',
            'slug' => 'jordi',
            'jabatan' => 'Teknisi',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568'
        ],
        [
            'nama' => 'Jordi',
            'slug' => 'jordi',
            'jabatan' => 'Teknisi',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568'
        ],
        [
            'nama' => 'Jordi',
            'slug' => 'jordi',
            'jabatan' => 'Teknisi',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568'
        ],
        [
            'nama' => 'Jordi',
            'slug' => 'jordi',
            'jabatan' => 'Teknisi',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568'
        ],
        [
            'nama' => 'Jordi',
            'slug' => 'jordi',
            'jabatan' => 'Teknisi',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568'
        ]
    ];
    
    return view('cari', [
        'title' => 'Cari Pegawai',
        'pegawai' => $list_pegawai
    ]);
});

Route::get('/cari/{slug}', function ($slug) {
    $list_pegawai = [
        [
            'nama' => 'Rizki',
            'slug' => 'rizki',	
            'jabatan' => 'Analisis Pengelolaan Keuangan APBN Ahli Pertama',
            'jenis_jabatan' => 'Administrator',
            'nip' => '19920926207105568'
        ],
        [
            'nama' => 'Dodi',
            'slug' => 'dodi',	
            'jabatan' => 'Analisis Pengelolaan Keuangan APBN Ahli Kedua',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568'
        ],
        [
            'nama' => 'Cecep',
            'slug' => 'cecep',
            'jabatan' => 'Tata Usaha',
            'jenis_jabatan' => 'Fungsional',
            'nip' => '19920926207105568'
        ],
        [
            'nama' => 'Martha',
            'slug' => 'martha',
            'jabatan' => 'Bendahara Pengeluaran',
            'jenis_jabatan' => 'Fungsional',
            'nip' => '19920926207105568'
        ],
        [
            'nama' => 'Jordi',
            'slug' => 'jordi',
            'jabatan' => 'Teknisi',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568'
        ],
        [
            'nama' => 'Jordi',
            'slug' => 'jordi',
            'jabatan' => 'Teknisi',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568'
        ],
        [
            'nama' => 'Jordi',
            'slug' => 'jordi',
            'jabatan' => 'Teknisi',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568'
        ],
        [
            'nama' => 'Jordi',
            'slug' => 'jordi',
            'jabatan' => 'Teknisi',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568'
        ],
        [
            'nama' => 'Jordi',
            'slug' => 'jordi',
            'jabatan' => 'Teknisi',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568'
        ]
    ];

    $pegawai = [];
    foreach($list_pegawai as $p){
        if($p['slug'] === $slug){
            $pegawai = $p;
            break;
        }
    }

    return view('pegawai', [
        'title' => 'Profile Pegawai',
        'pegawai' => $pegawai
    ]);
});