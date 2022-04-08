<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanUser extends Model
{
    use HasFactory;

    protected $table = 'jabatan_user';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function jabatan() {
        return $this->belongsTo(Jabatan::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function jenis_jabatan(){
        return $this->belongsTo(JenisJabatan::class);
    }
}
