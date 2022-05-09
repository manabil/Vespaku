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
        $user_search = User::with(['pangkat', 'jabatan']);

        if(request('search')){
            $search_user = User::with(['jabatan','pangkat'])->latest()->where('nama', 'LIKE', '%' . request('search') . '%')->get();
            $searched_id = collect();

            foreach ($search_user as $user) {
                $searched_id[] = $user->id;
            }

            $user_search = User::with(['pangkat', 'jabatan'])->latest()->whereIn('id', $searched_id);
        }
        
        return view('search', [
            'title' => 'Cari Pegawai',
            'pegawai' => $user_search->paginate(10)->withQueryString(),
        ]);
    }
    
    public function pegawai(User $user)
    {
        return view('user', [
            'title' => 'Profile Pegawai',
            'pegawai' => $user,
            'jabatans' => JabatanUser::with(['jenis_jabatan', 'jabatan', 'user'])->latest()->where('user_id', $user->id)->get(),
            'pangkats' => PangkatUser::with(['user', 'pangkat'])->latest()->where('user_id', $user->id)->get()
        ]);
    }

    public function request(PangkatUser $pangkat, Request $request){
        return $request;
    }
}
