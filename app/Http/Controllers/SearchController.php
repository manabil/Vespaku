<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JabatanUser;
use App\Models\PangkatUser;


class SearchController extends Controller
{
    public function index()
    {
        $user_search = JabatanUser::with(['user', 'jabatan','jenis_jabatan'])->latest();

        if(request('search')){
            $search_user = User::with(['jabatan','pangkat'])->latest()->where('nama', 'LIKE', '%' . request('search') . '%')->get();
            $searched_id = collect();

            foreach ($search_user as $user) {
                $searched_id[] = $user->id;
            }

            $user_search = JabatanUser::with(['user', 'jabatan','jenis_jabatan'])->latest()->whereIn('user_id', $searched_id);
        }
        
        return view('cari', [
            'title' => 'Cari Pegawai',
            'pegawai' => $user_search->paginate(10)
        ]);
    }
    
    public function pegawai(User $username)
    {
        return view('user', [
            'title' => 'Profile Pegawai',
            'pegawai' => $username,
            'jabatans' => JabatanUser::with(['jenis_jabatan', 'jabatan', 'user'])->latest()->where('user_id', $username->id)->get(),
            'pangkats' => PangkatUser::with(['user', 'pangkat'])->latest()->where('user_id', $username->id)->get()
        ]);
    }
}
