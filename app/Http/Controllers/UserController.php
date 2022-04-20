<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JabatanUser;
use App\Models\PangkatUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        return view('dashboard.profile.edit', [
            'title' => 'Edit Profile',
            'user' => User::with(['jabatan','pangkat'])->latest()->Firstwhere('id', auth()->user()->id),
            'jabatans' => JabatanUser::with(['jenis_jabatan', 'jabatan', 'user'])->latest()->where('user_id', auth()->user()->id)->get(),	
            'pangkats' => PangkatUser::with(['user', 'pangkat'])->latest()->where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
