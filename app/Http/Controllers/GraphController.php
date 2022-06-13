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

        $datasets = [];
        for ($i = 0; $i < count($listTahun); $i++) {
            $datasets[$i]['tahun'] = $listTahun[$i];
            $datasets[$i]['pangkat'] = [];
            for ($j = 0; $j < count($listUser); $j++) {
                for ($k = 0; $k < count($listPangkatUser); $k++) {
                    if (date('Y', strtotime($listPangkatUser[$k]['tmt'])) === $datasets[$i]['tahun']) {
                        $datasets[$i]['pangkat'][str_replace([' ', '-', '.'], '', $listPangkatUser[$k]->user->nama)] = ($listPangkatUser[$k]->user->id - 1) / 10;
                    }
                }
            }
        }

        $data = [];
        for ($i = 0; $i < count($listUser); $i++) {
            $data[$i]['label'] = $listUser[$i];
            $data[$i]['backgroundColor'] = 'red';
            $data[$i]['borderColor'] = 'red';
            $data[$i]['data'] = 'datasets';
            $data[$i]['parsing']['xAxisKey'] = 'tahun';
            $data[$i]['parsing']['yAxisKey'] = "pangkat." . str_replace([' ', '-', '.'], '', $listUser[$i]);
        }
        $data = json_encode($data);
        $data = preg_replace('/("datasets")/', 'datasets', $data);

        return view('graph', [
            'title' => 'Visualisasi Kepangkatan Pegawai',
            'listTahun' => $listTahun,
            'listUser' => $listUser,
            'listPangkat' => $listPangkat,
            'pangkats' => $listPangkatUser,
            'datasets' => $datasets,
            'data' => $data,
        ]);
    }
}
