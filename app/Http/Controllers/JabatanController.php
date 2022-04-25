<?php

namespace App\Http\Controllers;

use App\Models\JabatanUser;
use App\Models\Jabatan;
use App\Models\JenisJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jabatan_search = Jabatan::with(['user']);

        if(request('search')){
            $search_jabatan = Jabatan::with(['user'])->latest()->where('nama', 'LIKE', '%' . request('search') . '%')->get();
            $searched_id = collect();

            foreach ($search_jabatan as $jabatan) {
                $searched_id[] = $jabatan->id;
            }

            $jabatan_search = Jabatan::with(['user'])->latest()->whereIn('id', $searched_id);
        }
        
        return view('administrator.jabatan.index', [
            'title' => 'Manajemen Jabatan',
            'jabatans' => $jabatan_search->paginate(10),
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
        return view('administrator.jabatan.create', [
            'title' => 'Tambah Jabatan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:5|unique:jabatans',
            'slug' => 'required|min:5|unique:jabatans'
        ]);

        $validatedData['nama'] = ucwords($validatedData['nama']);
        $validatedData['slug'] = str_replace(['-', ':'], ' ', strtolower($validatedData['slug']));

        Jabatan::create($validatedData);
        return redirect('/jabatan')->with('alert_jabatan', 'Jabatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JabatanUser  $jabatanUser
     * @return \Illuminate\Http\Response
     */
    public function show(JabatanUser $jabatan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JabatanUser  $jabatanUser
     * @return \Illuminate\Http\Response
     */
    public function edit(JabatanUser $jabatan)
    {
        return view('administrator.jabatan.edit', [
            'title' => 'Ubah Jabatan',
            'jabatan' => $jabatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JabatanUser  $jabatanUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JabatanUser $jabatan)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JabatanUser  $jabatanUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(JabatanUser $jabatan)
    {
    }
}
