<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('dashboard.profile.index', [
            'title' => 'Profil Saya',
            'user' => $user
        ]);
    }
    
    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $rules = [
            'tanggal_lahir' => 'required',
            'foto' => 'image|max:2048'
            ];
        
        if($request->nama != $user->nama)
        {
            $rules['nama'] = 'required|min:3|unique:users|regex:/^[a-zA-Z ]{3,}$/';
        }
        if($request->nip != $user->nip)
        {
            $rules['nip'] = 'required|size:18|unique:users|regex:/^[0-9]{18}$/';
        }
        if($request->username != $user->username)
        {
            $rules['username'] = 'required|unique:users|min:5|regex:/^[a-zA-Z0-9_-]{5,}$/';
        }
        if($request->email != $user->email)
        {
            $rules['email'] = 'required|email:dns|unique:users';
        }
        if($request->password)
        {
            $rules['password'] = 'required|min:5';
        }
        
        $validated_data = $request;
        $validated_data['password'] = bcrypt($validated_data['password']);
        $validated_data['is_admin'] = false;
        $validated_data = $request->validate($rules);
        
        if($request->file('foto'))
        {
            Storage::delete($user->foto);
            $validated_data['foto'] = $request->file('foto')->store('foto_profile');
        }	

        User::where('id', auth()->user()->id)->update($validated_data);
        return redirect('/dashboard')->with('alert_profile', 'Profile berhasil diubah');
    }
}
