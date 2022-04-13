<?php

namespace App\Http\Controllers;

use App\Models\JabatanUser;
use App\Models\Jabatan;
use App\Models\JenisJabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
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
        return view('dashboard.jabatan.create', [
            'title' => 'Tambah Jabatan',
            'jabatans' => Jabatan::all(),
            'jenis_jabatans' => JenisJabatan::all()
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
            'jabatan_id' => 'required',
            'jenis_jabatan_id' => 'required',
            'no_surat_keterangan' => 'required|min:5',
            'tahun_masuk' => 'required',
            'surat_keterangan' => 'required|min:3',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['tahun_masuk'] = date('Y', strtotime($validatedData['tahun_masuk']));

        $unavailableJabatan = JabatanUser:: where('user_id', auth()->user()->id)
                                            ->where('jabatan_id', $validatedData['jabatan_id'])
                                            ->where('jenis_jabatan_id', $validatedData['jenis_jabatan_id'])->get();

        if($unavailableJabatan->isNotEmpty()){
            return redirect('/dashboard/jabatan/create')->with('jabatan_sudah_ada', 'Jabatan ini sudah ada. Mohon isi dengan jabatan yang lain');
        }

        JabatanUser::create($validatedData);
        return redirect('/dashboard')->with('alert_jabatan', 'Jabatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JabatanUser  $jabatanUser
     * @return \Illuminate\Http\Response
     */
    public function show(JabatanUser $jabatan)
    {
        return view('dashboard.jabatan.show', [
            'title' => 'Detail Jabatan',
            'jabatan' => $jabatan
        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JabatanUser  $jabatanUser
     * @return \Illuminate\Http\Response
     */
    public function edit(JabatanUser $jabatanUser)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JabatanUser  $jabatanUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JabatanUser $jabatanUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JabatanUser  $jabatanUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(JabatanUser $jabatan)
    {
        JabatanUser::destroy($jabatan->id);
        return redirect('/dashboard')->with('jabatan_dihapus', 'Jabatan berhasil dihapus');
    }
}
