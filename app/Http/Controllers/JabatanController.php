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
            'tmt' => 'required',
            'surat_keterangan' => 'required|file|mimes:pdf,doc,docx,epub'
        ]);
        
        $validatedData['user_id'] = auth()->user()->id;
        
        $unavailableJabatan = JabatanUser:: where('user_id', auth()->user()->id)
                                            ->where('jabatan_id', $validatedData['jabatan_id'])
                                            ->where('jenis_jabatan_id', $validatedData['jenis_jabatan_id'])->get();

        if($unavailableJabatan->isNotEmpty())
        {
            return redirect('/dashboard/jabatan/create')->with('jabatan_sudah_ada', 'Jabatan ini sudah ada. Mohon isi dengan jabatan yang lain');
        }

        if($request->file('surat_keterangan'))
        {
            $validatedData['surat_keterangan'] = $request->file('surat_keterangan')->store('surat_keterangan');
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
    public function edit(JabatanUser $jabatan)
    {
        $nama_jabatan = $jabatan->jabatan->nama;
        $nama_jenis_jabatan = $jabatan->jenis_jabatan->nama;
        $tmt = $jabatan->tmt;
        $no_surat_keterangan = $jabatan->no_surat_keterangan;
        $surat_keterangan = $jabatan->surat_keterangan;

        return view('dashboard.jabatan.edit', [
            'title' => 'Edit Jabatan',
            'jabatan' => $jabatan,
            'jabatans' => Jabatan::all(),
            'jenis_jabatans' => JenisJabatan::all(),
            'nama_jabatan' => $nama_jabatan,
            'nama_jenis_jabatan' => $nama_jenis_jabatan,
            'tmt' => $tmt,
            'no_surat_keterangan' => $no_surat_keterangan,
            'surat_keterangan' => $surat_keterangan
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
        $validatedData = $request->validate([
            'jabatan_id' => 'required',
            'jenis_jabatan_id' => 'required',
            'no_surat_keterangan' => 'required|min:5',
            'tmt' => 'required',
            'surat_keterangan' => 'required|file|mimes:pdf,doc,docx,epub',
        ]);
        
        dd($request->all());
        $validatedData['user_id'] = auth()->user()->id;

        $unavailableJabatan = JabatanUser:: where('user_id', auth()->user()->id)
                                            ->where('jabatan_id', $validatedData['jabatan_id'])
                                            ->where('jenis_jabatan_id', $validatedData['jenis_jabatan_id'])->get();

        if($unavailableJabatan->isNotEmpty()){
            return redirect('/dashboard/jabatan/'.$jabatan->id.'/edit')->with('jabatan_sudah_ada', 'Jabatan ini sudah ada. Mohon isi dengan jabatan yang lain');
        }

        if($request->file('surat_keterangan'))
        {
            $validatedData['surat_keterangan'] = $request->file('surat_keterangan')->store('surat_keterangan');
        }	

        JabatanUser::where('id', $jabatan->id)->update($validatedData);
        return redirect('/dashboard')->with('alert_jabatan', 'Jabatan berhasil ditambahkan');
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
