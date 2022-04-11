<?php

namespace App\Http\Controllers;

use App\Models\JabatanUser;
use App\Models\PangkatUser;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        //
    }

    public function cari(){
        $user_search = JabatanUser::with(['user', 'jabatan','jenis_jabatan'])->latest();

        if(request('search')){
            $user_search ->where('user_id', 'like', (User::where('nama', 'like', '%'.request('search').'%')->first())->id);
                            // ->orWhere('jabatan_id', 'like', (JabatanPegawai::where('nama', 'like', '%'.request('search').'%')->first())->id)
                            // ->orWhere('jenis_jabatan_id', 'like', (PangkatPegawai::where('nama', 'like', '%'.request('search').'%')->first())->id);
        }

        return view('cari', [
            'title' => 'Cari Pegawai',
            'pegawai' => $user_search->paginate(10)
        ]);
    }
    
    public function pegawai(User $username){
        return view('user', [
            'title' => 'Profile Pegawai',
            'pegawai' => $username,
            'jabatans' => JabatanUser::with(['jenis_jabatan', 'jabatan', 'user'])->latest()->where('user_id', $username->id)->get(),
            'pangkats' => PangkatUser::with(['user', 'pangkat'])->latest()->where('user_id', $username->id)->get()
        ]);
    }
}
