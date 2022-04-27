<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JabatanUser;
use App\Models\PangkatUser;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'jabatans' => JabatanUser::with(['jenis_jabatan', 'jabatan', 'user'])->latest()->where('user_id', auth()->user()->id)->get(),
            'pangkats' => PangkatUser::with(['user', 'pangkat'])->latest()->where('user_id', auth()->user()->id)->get()
        ]);
    }
}
