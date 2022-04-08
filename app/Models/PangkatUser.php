<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PangkatUser extends Model
{
    use HasFactory;

    protected $table = 'pangkat_user';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function pangkat() {
        return $this->belongsTo(Pangkat::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
