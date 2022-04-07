<?php

namespace App\Http\Controllers;

use App\Models\JabatanPegawai;
use App\Models\JenisJabatan;
use App\Models\PangkatPegawai;
use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index(){
        //
    }

    public function cari(){
        $pegawai_search = JabatanPegawai::with(['pegawai', 'jabatan','jenis_jabatan'])->latest();

        if(request('search')){
            $pegawai_search ->where('pegawai_id', 'like', (Pegawai::where('nama', 'like', '%'.request('search').'%')->first())->id);
                            // ->orWhere('jabatan_id', 'like', (JabatanPegawai::where('nama', 'like', '%'.request('search').'%')->first())->id)
                            // ->orWhere('jenis_jabatan_id', 'like', (PangkatPegawai::where('nama', 'like', '%'.request('search').'%')->first())->id);
        }

        return view('cari', [
            'title' => 'Cari Pegawai',
            'pegawai' => $pegawai_search->paginate(10)
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
