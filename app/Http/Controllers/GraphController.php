<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JenisJabatan;
use App\Models\PangkatUser;
use App\Models\JabatanUser;

class GraphController extends Controller
{
    public function index()
    {
        $listTahun = PangkatUser::oldest('tmt')->pluck('tmt')->map(function ($item) {
            return date('Y', strtotime($item));
        })->merge(JabatanUser::oldest('tmt')->pluck('tmt')->map(function ($item) {
            return date('Y', strtotime($item));
        }))->unique()->sort()->values();
        $listUser = User::all()->pluck('nama');
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
                        $datasets[$i]['pangkat'][str_replace([' ', '-', '.'], '', $listPangkatUser[$k]->user->nama)]['index'] = array_keys($listUser->toArray(), $listPangkatUser[$k]->user->nama)[0] / 10;
                    }
                }
                for ($k = 0; $k < count($listJabatanUser); $k++) {
                    if (date('Y', strtotime($listJabatanUser[$k]['tmt'])) === $datasets[$i]['tahun']) {
                        $datasets[$i]['pangkat'][str_replace([' ', '-', '.'], '', $listJabatanUser[$k]->user->nama)]['index'] = array_keys($listUser->toArray(), $listJabatanUser[$k]->user->nama)[0] / 10;
                    }
                }
            }
        }
        $datasets = json_encode($datasets);

        $userLink = User::all()->pluck('username');

        $backgroundColor = [
            'steelblue',
            'magenta',
            'rgba(160, 44, 93, 1)',
            'rgba(236, 15, 71, 1)',
            'rgba(238, 107, 59, 1)',
            'rgba(21, 194, 134, 1)',
            'rgba(4, 84, 89, 1)',
            'rgba(171, 217, 109, 1)',
            'rgba(251, 191, 84, 1)'
        ];
        $borderColor = [
            'steelblue',
            'magenta',
            'rgba(160, 44, 93, 1)',
            'rgba(236, 15, 71, 1)',
            'rgba(238, 107, 59, 1)',
            'rgba(21, 194, 134, 1)',
            'rgba(4, 84, 89, 1)',
            'rgba(171, 217, 109, 1)',
            'rgba(251, 191, 84, 1)'
        ];

        $data = [];
        for ($i = 0; $i < count($listUser); $i++) {
            $randomColor = array_rand($backgroundColor);
            $data[$i]['label'] = $listUser[$i];
            $data[$i]['backgroundColor'] = $backgroundColor[$randomColor];
            $data[$i]['borderColor'] = $borderColor[$randomColor];
            $data[$i]['spanGaps'] = true;
            $data[$i]['data'] = 'datasets';
            $data[$i]['link'] = '/cari/' . $userLink[$i];
            $data[$i]['parsing']['xAxisKey'] = 'tahun';
            $data[$i]['parsing']['yAxisKey'] = "pangkat." . str_replace([' ', '-', '.'], '', $listUser[$i]) . '.index';
        }
        $data = json_encode($data);
        $data = preg_replace('/("datasets")/', 'datasets', $data);

        $pangkat = [];
        $jabatan = [];
        $jenisJabatan = JenisJabatan::all()->pluck('nama', 'id');
        foreach ($listPangkatUser as $key => $user) {
            $pangkat[$key][date('Y', strtotime($user->tmt))] = $user->pangkat->nama;
        }
        foreach ($listJabatanUser as $key => $user) {
            $jabatan[$key][date('Y', strtotime($user->tmt))] = $jenisJabatan[$user->jenis_jabatan_id] . ' - ' . $user->jabatan->nama;
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
