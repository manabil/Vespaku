<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index(){
        return view('/daftar', [
            'title' => 'Daftar Akun'
        ]);
    }

    public function add(Request $request){
        $rules = [
                    'nama' => 'required|min:3|unique:users|regex:/^[a-zA-Z ]{3,}$/',
                    'nip' => 'required|size:18|unique:users|regex:/^[0-9]{18}$/',
                    'username' => 'required|unique:users|min:5|regex:/^[a-zA-Z0-9_-]{5,}$/',
                    'password' => 'required|min:5',
                    'email' => 'required|email:dns|unique:users',
                    'tanggal_lahir' => 'required',
                    'foto' => 'required|image|max:2048'
                    ];

        if($request->file('foto'))
        {
            $rules['foto'] = 'image|max:2048';
        }
        
        $data_request = $request;
        $data_request['password'] = bcrypt($data_request['password']);
        
        $validated_data = $data_request->validate($rules);
        $validated_data['username'] = str_replace('/', '-', openssl_encrypt($validated_data['username'], 'AES-128-ECB', 'VESPaKU'));
        $validated_data['user_type'] = 'user';
        
        if($request->file('foto'))
        {
            $validated_data['foto'] = $request->file('foto')->store('foto_profile');
        }

        User::create($validated_data);
        
        return redirect('/login')->with('success', 'Berhasil mendaftar, Silahkan Login');

    }
}
