<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'pangkat',
        'tmt_pangkat',
        'jabatan',
        'jenis_jabatan',
        'tmt_jabatan',
        'email',
        'slug',
        'is_admin'
    ];
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
}
