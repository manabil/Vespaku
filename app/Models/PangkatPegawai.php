<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PangkatPegawai extends Model
{
    use HasFactory;

    protected $table = 'pangkat_pegawai';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function pangkat() {
        return $this->belongsTo(Pangkat::class);
    }

    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }
}
