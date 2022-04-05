<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function pangkat() {
        return $this->belongsToMany(Pangkat::class);
    }
    
    public function jabatan() {
        return $this->belongsToMany(Jabatan::class);
    }
    
    public function jabatan_pegawai() {
        return $this->hasMany(JabatanPegawai::class);
    }
}
