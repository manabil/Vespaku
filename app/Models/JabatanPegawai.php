<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanPegawai extends Model
{
    use HasFactory;

    protected $table = 'jabatan_pegawai';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function jabatan() {
        return $this->belongsTo(Jabatan::class);
    }

    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }

    public function jenis_jabatan(){
        return $this->belongsTo(JenisJabatan::class);
    }
}
