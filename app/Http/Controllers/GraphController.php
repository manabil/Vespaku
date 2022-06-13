<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pangkat;
use App\Models\PangkatUser;
use App\Models\JabatanUser;
use App\Models\Request as RequestModel;

class GraphController extends Controller
{
    public function index()
    {
        $listTahun = PangkatUser::oldest('tmt')->pluck('tmt')->map(function ($item) {
            return date('Y', strtotime($item));
        })->unique()->values();
        $listUser = User::all()->pluck('nama');
        $listPangkat = Pangkat::all()->pluck('nama');
        $listPangkatUser = PangkatUser::with(['user', 'pangkat'])->get();

        $jos = [
            'tahun' => '2002',
            'pangkat' => [
                'sulis' => 1,
                'cecep' => 2,
                'kapten' => 3,
                'lintasan' => 4,
                'komandan' => 5,
                'komandan lintasan' => 6,
                'komandan sulis' => 7,
                'komandan cecep' => 8,
                'komandan kapten' => 9,
                'komandan komandan' => 10,
            ]
        ];

        return view('graph', [
            'title' => 'Visualisasi Kepangkatan Pegawai',
            'listTahun' => $listTahun,
            'listUser' => $listUser,
            'listPangkat' => $listPangkat,
            'pangkats' => $listPangkatUser,
            'jos' => $jos,
            // 'pegawai' => $user_search->paginate(10)->withQueryString(),
        ]);
    }
}
