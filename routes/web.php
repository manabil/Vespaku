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
            'pangkat' => 'Pembina Tk. I',
            'jabatan' => 'Analisis Pengelolaan Keuangan APBN Ahli Pertama',
            'jenis_jabatan' => 'Administrator',
            'nip' => '19920926207105568',
            'email' => 'rizki@bpmpk.gov.id'
        ],
        [
            'nama' => 'Dodi',
            'slug' => 'dodi',	
            'pangkat' => 'Pembina Tk. II',
            'jabatan' => 'Analisis Pengelolaan Keuangan APBN Ahli Kedua',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568',
            'email' => 'dodi@bpmpk.gov.id'
        ],
        [
            'nama' => 'Cecep',
            'slug' => 'cecep',
            'pangkat' => 'Pembina Tk. III',
            'jabatan' => 'Tata Usaha',
            'jenis_jabatan' => 'Fungsional',
            'nip' => '19920926207105568',
            'email' => 'cecep@bpmpk.gov.id'
        ],
        [
            'nama' => 'Martha',
            'slug' => 'martha',
            'pangkat' => 'Pembina Tk. I',
            'jabatan' => 'Bendahara Pengeluaran',
            'jenis_jabatan' => 'Fungsional',
            'nip' => '19920926207105568',
            'email' => 'martha@bpmpk.gov.id'
        ],
        [
            'nama' => 'Jordi',
            'slug' => 'jordi',
            'pangkat' => 'Pembina Tk. II',
            'jabatan' => 'Teknisi',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568',
            'email' => 'jordi@bpmpk.gov.id'
        ],
        [
            'nama' => 'Asep',
            'slug' => 'asep',
            'pangkat' => 'Pembina Tk. I',
            'jabatan' => 'Sekretaris',
            'jenis_jabatan' => 'Fungsionalis',
            'nip' => '19920926207105568',
            'email' => 'asep@bpmpk.gov.id'
        ],
        [
            'nama' => 'Bagus',
            'slug' => 'bagus',
            'pangkat' => 'Pembina Tk. III',
            'jabatan' => 'Asisten Sekretaris',
            'jenis_jabatan' => 'Fungsionalis',
            'nip' => '19920926207105568',
            'email' => 'bagus@bpmpk.gov.id'
        ],
        [
            'nama' => 'Malik',
            'slug' => 'malik',
            'pangkat' => 'Pembina Tk. I',
            'jabatan' => 'Teknisi',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568',
            'email' => 'malik@bpmpk.gov.id'
        ],
        [
            'nama' => 'Surya',
            'slug' => 'surya',
            'pangkat' => 'Pembina Tk. II',
            'jabatan' => 'Tata Usaha',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568',
            'email' => 'surya@bpmpk.gov.id'
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
            'pangkat' => 'Pembina Tk. I',
            'jabatan' => 'Analisis Pengelolaan Keuangan APBN Ahli Pertama',
            'jenis_jabatan' => 'Administrator',
            'nip' => '19920926207105568',
            'email' => 'rizki@bpmpk.gov.id'
        ],
        [
            'nama' => 'Dodi',
            'slug' => 'dodi',	
            'pangkat' => 'Pembina Tk. II',
            'jabatan' => 'Analisis Pengelolaan Keuangan APBN Ahli Kedua',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568',
            'email' => 'dodi@bpmpk.gov.id'
        ],
        [
            'nama' => 'Cecep',
            'slug' => 'cecep',
            'pangkat' => 'Pembina Tk. III',
            'jabatan' => 'Tata Usaha',
            'jenis_jabatan' => 'Fungsional',
            'nip' => '19920926207105568',
            'email' => 'cecep@bpmpk.gov.id'
        ],
        [
            'nama' => 'Martha',
            'slug' => 'martha',
            'pangkat' => 'Pembina Tk. I',
            'jabatan' => 'Bendahara Pengeluaran',
            'jenis_jabatan' => 'Fungsional',
            'nip' => '19920926207105568',
            'email' => 'martha@bpmpk.gov.id'
        ],
        [
            'nama' => 'Jordi',
            'slug' => 'jordi',
            'pangkat' => 'Pembina Tk. II',
            'jabatan' => 'Teknisi',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568',
            'email' => 'jordi@bpmpk.gov.id'
        ],
        [
            'nama' => 'Asep',
            'slug' => 'asep',
            'pangkat' => 'Pembina Tk. I',
            'jabatan' => 'Sekretaris',
            'jenis_jabatan' => 'Fungsionalis',
            'nip' => '19920926207105568',
            'email' => 'asep@bpmpk.gov.id'
        ],
        [
            'nama' => 'Bagus',
            'slug' => 'bagus',
            'pangkat' => 'Pembina Tk. III',
            'jabatan' => 'Asisten Sekretaris',
            'jenis_jabatan' => 'Fungsionalis',
            'nip' => '19920926207105568',
            'email' => 'bagus@bpmpk.gov.id'
        ],
        [
            'nama' => 'Malik',
            'slug' => 'malik',
            'pangkat' => 'Pembina Tk. I',
            'jabatan' => 'Teknisi',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568',
            'email' => 'malik@bpmpk.gov.id'
        ],
        [
            'nama' => 'Surya',
            'slug' => 'surya',
            'pangkat' => 'Pembina Tk. II',
            'jabatan' => 'Tata Usaha',
            'jenis_jabatan' => 'Pelaksana',
            'nip' => '19920926207105568',
            'email' => 'surya@bpmpk.gov.id'
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