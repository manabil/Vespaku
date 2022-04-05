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
        $pegawai = Pegawai::latest();

        if(request('search')){
            $pegawai->where('nama', 'like', '%'.request('search').'%');
        }

        return view('cari', [
            'title' => 'Cari Pegawai',
            'pegawai' => JabatanPegawai::with(['pegawai', 'jabatan','jenis_jabatan'])->latest()->get()
        ]);
    }
    
    public function pegawai(Pegawai $username){
        return view('pegawai', [
            'title' => 'Profile Pegawai',
            'pegawai' => $username,
            'jabatans' => JabatanPegawai::with(['jenis_jabatan', 'jabatan', 'pegawai'])->latest()->where('pegawai_id', $username->id)->get(),
            'pangkats' => PangkatPegawai::with(['pegawai', 'pangkat'])->latest()->where('pegawai_id', $username->id)->get()
        ]);
    }
}
