<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index(){
        return view('/daftar', [
            'title' => 'Daftar Akun'
        ]);
    }

    public function store(Request $request){
        $validated_data = $request->validate([
                            'nama' => 'required|min:3|unique:pegawais|regex:/^[a-zA-Z ]{3,}$/',
                            'nip' => 'required|size:18|unique:pegawais|regex:/^[0-9]{18}$/',
                            'username' => 'required|unique:pegawais|min:5|regex:/^[a-zA-Z0-9_-]{5,}$/',
                            'password' => 'required|min:5',
                            'email' => 'required|email:dns|unique:pegawais',
                            'tanggal_lahir' => 'required',
                            ]);
        
        $validated_data['password'] = bcrypt($validated_data['password']);
        $validated_data['is_admin'] = false;

        Pegawai::create($validated_data);
        
        return redirect()->with('success', 'Berhasil mendaftar, Silahkan Login');

    }
}
