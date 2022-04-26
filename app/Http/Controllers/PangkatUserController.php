<?php

namespace App\Http\Controllers;

use App\Models\PangkatUser;
use Illuminate\Http\Request;
use App\Models\Pangkat;
use Illuminate\Support\Facades\Storage;

class PangkatUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pangkat.create', [
            'title' => 'Tambah Pangkat',
            'pangkats' => Pangkat::all()
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
                'pangkat_id' => 'required',
                'no_surat_keterangan' => 'required|min:5',
                'tmt' => 'required',
                'surat_keterangan' => 'required|file|mimes:pdf,doc,docx,epub'
        ]);
        
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = str_replace('/', '', bcrypt(str_replace(['-',' ', ':'], '', now()->toDateTimeString())));

        $unavailablePangkat = PangkatUser:: where('user_id', auth()->user()->id)
                                            ->where('pangkat_id', $validatedData['pangkat_id'])->get();

        if($unavailablePangkat->isNotEmpty()){
            return redirect('/dashboard/pangkat/create')->with('pangkat_sudah_ada', 'Pangkat ini sudah ada. Mohon isi dengan pangkat yang lain');
        }

        if($request->file('surat_keterangan'))
        {
            $validatedData['surat_keterangan'] = $request->file('surat_keterangan')->store('surat_keterangan_pangkat');
        }

        PangkatUser::create($validatedData);
        return redirect('/dashboard')->with('alert_pangkat', 'Pangkat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PangkatUser  $pangkatUser
     * @return \Illuminate\Http\Response
     */
    public function show(PangkatUser $pangkat)
    {
        return view('dashboard.pangkat.show', [
            'title' => 'Detail Pangkat',
            'pangkat' => $pangkat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PangkatUser  $pangkatUser
     * @return \Illuminate\Http\Response
     */
    public function edit(PangkatUser $pangkat)
    {
        $no_surat_keterangan = $pangkat->no_surat_keterangan;
        $tmt = $pangkat->tmt;
        $surat_keterangan = $pangkat->surat_keterangan;

        return view('dashboard.pangkat.edit', [
            'title' => 'Edit Pangkat',
            'pangkat' => $pangkat,
            'no_surat_keterangan' => $no_surat_keterangan,
            'tmt' => $tmt,
            'surat_keterangan' => $surat_keterangan,
            'pangkats' => Pangkat::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PangkatUser  $pangkatUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PangkatUser $pangkat)
    {
        $validatedData = $request->validate([
            'pangkat_id' => 'required',
            'no_surat_keterangan' => 'required|min:5',
            'tmt' => 'required',
            'surat_keterangan' => 'file|mimes:pdf,doc,docx,epub',
        ]);
        
        $validatedData['user_id'] = auth()->user()->id;

        if($pangkat->pangkat->id != $request['pangkat_id'])
        {
            $unavailablePangkat = PangkatUser:: where('user_id', auth()->user()->id)
                                                ->where('pangkat_id', $validatedData['pangkat_id'])->get();
    
            if($unavailablePangkat->isNotEmpty()){
                return redirect('/dashboard/pangkat/'.$pangkat->id.'/edit')->with('pangkat_sudah_ada', 'Pangkat ini sudah ada. Mohon isi dengan pangkat yang lain');
            }
        }

        if($request->file('surat_keterangan'))
        {
            Storage::delete($pangkat->surat_keterangan);
            $validatedData['surat_keterangan'] = $request->file('surat_keterangan')->store('surat_keterangan_pangkat');
        }	

        PangkatUser::where('id', $pangkat->id)->update($validatedData);
        return redirect('/dashboard')->with('alert_pangkat', 'Pangkat berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PangkatUser  $pangkatUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(PangkatUser $pangkat)
    {
        Storage::delete($pangkat->surat_keterangan);
        PangkatUser::destroy($pangkat->id);
        return redirect('/dashboard')->with('pangkat_dihapus', 'Pangkat berhasil dihapus');
    }
}
