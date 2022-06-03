<?php

namespace App\Http\Controllers;

use App\Models\JabatanUser;
use App\Models\PangkatUser;
use App\Models\Pangkat;


class DashboardController extends Controller
{
    public function index()
    {
        $listPangkatUser = PangkatUser::with(['user', 'pangkat'])->latest('tmt')->where('user_id', auth()->user()->id)->get();
        $listPangkat = $listPangkatUser->pluck('pangkat.nama');
        $listTahun = $listPangkatUser->pluck('tmt')->map(function ($item) {
            return date('Y', strtotime($item));
        });

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'jabatans' => JabatanUser::with(['jenis_jabatan', 'jabatan', 'user'])->latest()->where('user_id', auth()->user()->id)->get(),
            'pangkats' => $listPangkatUser,
            'listPangkat' => $listPangkat,
            'listTahun' => $listTahun,
        ]);
    }
}
