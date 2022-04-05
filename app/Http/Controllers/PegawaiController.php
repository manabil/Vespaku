<?php

namespace App\Http\Controllers;

use App\Models\JabatanPegawai;
use App\Models\PangkatPegawai;
use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index(){
        //
    }

    public function cari(){
        return view('cari', [
            'title' => 'Cari Pegawai',
            'pegawai' => JabatanPegawai::latest()->get()
        ]);
    }
    
    public function pegawai(Pegawai $username){
        return view('pegawai', [
            'title' => 'Profile Pegawai',
            'pegawai' => $username,
            'jabatans' => JabatanPegawai::where('pegawai_id', $username->id)->get(),
            'pangkats' => PangkatPegawai::where('pegawai_id', $username->id)->get()
        ]);
    }
}
