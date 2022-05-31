<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PangkatUser;
use App\Models\JabatanUser;
use App\Models\Request as RequestModel;

class GraphController extends Controller
{
    public function index()
    {
        $listTahun = PangkatUser::latest('tmt')->pluck('tmt')->map(function ($item) {
            return date('Y', strtotime($item));
        })->unique()->values();
        $listUser = User::all()->pluck('nama');
        return $listUser;

        return view('graph', [
            'title' => 'Visualisasi Kepangkatan Pegawai',
            'listTahun' => $listTahun,
            'listUser' => $listUser,
            // 'pegawai' => $user_search->paginate(10)->withQueryString(),
        ]);
    }
}
