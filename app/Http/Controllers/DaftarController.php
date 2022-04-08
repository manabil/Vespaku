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
                            'nama' => 'required|min:3|unique:pegawais',
                            'nip' => 'required|min:16',
                            'username' => 'required|unique:pegawais|min:5|regex:/^.+@. +$/i',
                            'password' => 'required|min:5',
                            'email' => 'required|email:dns',
                            'tanggal' => 'required',
                            ]);
        
        $validated_data['password'] = bcrypt($validated_data['password']);

        Pegawai::create($validated_data);

        return redirect('/login');

    }
}
