<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pangkat;
use App\Models\Jabatan;
use App\Models\PangkatUser;
use App\Models\JabatanUser;
use App\Models\Request as RequestModel;

class GraphController extends Controller
{
    public function index()
    {
        $listTahun = PangkatUser::oldest('tmt')->pluck('tmt')->map(function ($item) {
            return date('Y', strtotime($item));
        })->merge(JabatanUser::oldest('tmt')->pluck('tmt')->map(function ($item) {
            return date('Y', strtotime($item));
        }))->unique()->values();
        $listUser = User::all()->pluck('nama');
        $listPangkat = Pangkat::all()->pluck('nama');
        $listPangkatUser = PangkatUser::with(['user', 'pangkat'])->get();
        $listJabatanUser = JabatanUser::with(['user', 'jabatan'])->get();

        $datasets = [];
        for ($i = 0; $i < count($listTahun); $i++) {
            $datasets[$i]['tahun'] = $listTahun[$i];
            $datasets[$i]['pangkat'] = [];
            $datasets[$i]['jabatan'] = [];
            for ($j = 0; $j < count($listUser); $j++) {
                for ($k = 0; $k < count($listPangkatUser); $k++) {
                    if (date('Y', strtotime($listPangkatUser[$k]['tmt'])) === $datasets[$i]['tahun']) {
                        $datasets[$i]['pangkat'][str_replace([' ', '-', '.'], '', $listPangkatUser[$k]->user->nama)]['index'] = ($listPangkatUser[$k]->user->id - 1) / 10;
                        $datasets[$i]['label_pangkat'] = $listPangkatUser[$k]->pangkat->nama;
                    }
                }
                // for ($k = 0; $k < count($listJabatanUser); $k++) {
                //     if (date('Y', strtotime($listJabatanUser[$k]['tmt'])) === $datasets[$i]['tahun']) {
                //         $datasets[$i]['jabatan'][str_replace([' ', '-', '.'], '', $listJabatanUser[$k]->user->nama)]['index'] = ($listJabatanUser[$k]->user->id - 1) / 10;
                //         $datasets[$i]['jabatan'][str_replace([' ', '-', '.'], '', $listJabatanUser[$k]->user->nama)]['label_jabatan'] = $listJabatanUser[$k]->jabatan->nama;
                //     }
                // }
            }
        }

        $data = [];
        for ($i = 0; $i < count($listUser); $i++) {
            $data[$i]['label'] = $listUser[$i];
            $data[$i]['backgroundColor'] = 'red';
            $data[$i]['borderColor'] = 'red';
            $data[$i]['data'] = 'datasets';
            $data[$i]['parsing']['xAxisKey'] = 'tahun';
            $data[$i]['parsing']['yAxisKey'] = "jabatan." . str_replace([' ', '-', '.'], '', $listUser[$i]) . '.index';
            $data[$i]['parsing']['yAxisKey'] = "pangkat." . str_replace([' ', '-', '.'], '', $listUser[$i]) . '.index';
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
