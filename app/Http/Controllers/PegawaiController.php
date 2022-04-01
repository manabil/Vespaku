<?php

namespace App\Http\Controllers;

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
            'pegawai' => Pegawai::all()
        ]);
    }

    public function profile($slug){
        return view('pegawai', [
            'title' => 'Profile Pegawai',
            'pegawai' => Pegawai::find($slug)
        ]);
    }
}
