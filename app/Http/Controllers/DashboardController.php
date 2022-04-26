<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JabatanUser;
use App\Models\PangkatUser;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        // $jos = openssl_encrypt('Muhammad Ammar Nabil', 'AES-128-CBC', 'VESPaKu',0,'1234567891234567');
        // return $jos;
        // return openssl_decrypt($jos, 'AES-128-CBC', 'VESPaKu',0,'1234567891234567');
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'jabatans' => JabatanUser::with(['jenis_jabatan', 'jabatan', 'user'])->latest()->where('user_id', auth()->user()->id)->get(),
            'pangkats' => PangkatUser::with(['user', 'pangkat'])->latest()->where('user_id', auth()->user()->id)->get()
        ]);
    }
}
