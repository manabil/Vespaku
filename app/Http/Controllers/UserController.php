<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JabatanUser;
use App\Models\PangkatUser;
use App\Models\Request as RequestUser;
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
    public function index(Request $request)
    {
        $user_search = User::with(['pangkat', 'jabatan']);

        if (request('search')) {
            $search_user = User::with(['jabatan', 'pangkat'])->latest()->where('nama', 'LIKE', '%' . request('search') . '%')->get();
            $searched_id = collect();

            foreach ($search_user as $user) {
                $searched_id[] = $user->id;
            }

            $user_search = User::with(['pangkat', 'jabatan'])->latest()->whereIn('id', $searched_id);
        }

        return view('administrator.user.index', [
            'title' => 'Manajemen User',
            'users' => $user_search->paginate(10)->withQueryString(),
            'page' => $request->page
        ]);
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
        return view('administrator.user.show', [
            'title' => 'Profile Pegawai',
            'pegawai' => $user,
            'jabatans' => JabatanUser::with(['jenis_jabatan', 'jabatan', 'user'])->latest()->where('user_id', $user->id)->get(),
            'pangkats' => PangkatUser::with(['user', 'pangkat'])->latest()->where('user_id', $user->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
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
        User::where('id', $user->id)->update(['user_type' => $request->user_type]);
        return redirect('/user')->with('alert_user', 'User berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::delete(User::where('id', $user->id)->pluck('foto')->toArray());
        User::destroy($user->id);
        Storage::delete(JabatanUser::where('user_id', $user->id)->pluck('surat_keterangan')->toArray());
        JabatanUser::destroy(JabatanUser::where('user_id', $user->id)->get());
        Storage::delete(PangkatUser::where('user_id', $user->id)->pluck('surat_keterangan')->toArray());
        PangkatUser::destroy(PangkatUser::where('user_id', $user->id)->get());
        RequestUser::destroy(RequestUser::where('user_id', $user->id)->get());
        return redirect('/user')->with('user_dihapus', 'User berhasil dihapus');
    }
}
