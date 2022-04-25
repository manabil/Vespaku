<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

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
            'nama' => 'required|min:5|unique:jabatans|regex:/^[a-zA-Z ]{5,}$/'
        ]);

        $validatedData['nama'] = ucwords($validatedData['nama']);
        $validatedData['slug'] = str_replace(' ', '-', strtolower($validatedData['nama']));

        Jabatan::create($validatedData);
        return redirect('/jabatan')->with('alert_jabatan', 'Jabatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatans)
    {
        return view('administrator.jabatan.edit', [
            'title' => 'Edit Jabatan',
            'jabatan' => $jabatans
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatans)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:5|unique:jabatans|regex:/^[a-zA-Z ]{5,}$/'
        ]);

        $validatedData['nama'] = ucwords($validatedData['nama']);
        $validatedData['slug'] = str_replace(' ', '-', strtolower($validatedData['nama']));

        Jabatan::where('id', $jabatans->id)->update($validatedData);
        return redirect('/jabatan')->with('alert_jabatan', 'Jabatan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatans)
    {
        Jabatan::destroy($jabatans->id);
        return redirect('/jabatan')->with('jabatan_dihapus', 'Jabatan berhasil dihapus');
    }
}
