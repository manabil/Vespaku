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
                    }
                }
                for ($k = 0; $k < count($listJabatanUser); $k++) {
                    if (date('Y', strtotime($listJabatanUser[$k]['tmt'])) === $datasets[$i]['tahun']) {
                        $datasets[$i]['pangkat'][str_replace([' ', '-', '.'], '', $listJabatanUser[$k]->user->nama)]['index'] = ($listJabatanUser[$k]->user->id - 1) / 10;
                    }
                }
            }
        }
        $datasets = json_encode($datasets);

        $userLink = User::all()->pluck('username');

        $data = [];
        for ($i = 0; $i < count($listUser); $i++) {
            $data[$i]['label'] = $listUser[$i];
            $data[$i]['backgroundColor'] = 'red';
            $data[$i]['borderColor'] = 'red';
            $data[$i]['data'] = 'datasets';
            $data[$i]['link'] = '/cari/' . $userLink[$i];
            $data[$i]['parsing']['xAxisKey'] = 'tahun';
            $data[$i]['parsing']['yAxisKey'] = "pangkat." . str_replace([' ', '-', '.'], '', $listUser[$i]) . '.index';
        }
        $data = json_encode($data);
        $data = preg_replace('/("datasets")/', 'datasets', $data);

        $pangkat = [];
        $jabatan = [];
        foreach ($listPangkatUser as $user) {
            $pangkat[$user->user->id - 1][date('Y', strtotime($user->tmt))] = $user->pangkat->nama;
        }
        foreach ($listJabatanUser as $user) {
            $jabatan[$user->user->id - 1][date('Y', strtotime($user->tmt))] = $user->jabatan->nama;
        }
        $pangkat = json_encode($pangkat);
        $jabatan = json_encode($jabatan);



        return view('graph', [
            'title' => 'Visualisasi Kepangkatan Pegawai',
            'listTahun' => $listTahun,
            'listUser' => $listUser,
            'listPangkat' => $listPangkatUser,
            'listLink' => $userLink,
            'datasets' => $datasets,
            'data' => $data,
            'label_pangkat' => $pangkat,
            'label_jabatan' => $jabatan,
        ]);
    }
}
