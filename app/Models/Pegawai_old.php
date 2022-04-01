<?php

namespace App\Models;

class Pegawai {
    private static $list_pegawai = [
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


    // *=============== Get List Pegawai ===============*
    public static function all() {
        return collect(self::$list_pegawai);
    }
    
    // *=============== Find Pegawai ===============*
    public static function find($slug) {
        $pegawai = static::all();
        return $pegawai->firstWhere('slug', $slug);
    }
}
