<?php

namespace App\Http\Controllers;

use App\Models\PangkatUser;
use App\Models\Pangkat;
use Illuminate\Http\Request;

class PangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return route('dashboard');
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
            'tahun_masuk' => 'required',
            'surat_keterangan' => 'required|min:3',
        ]);
        
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['tahun_masuk'] = date('Y', strtotime($validatedData['tahun_masuk']));

        $unavailablePangkat = PangkatUser:: where('user_id', auth()->user()->id)
                                            ->where('pangkat_id', $validatedData['pangkat_id'])->get();

        if($unavailablePangkat->isNotEmpty()){
            return redirect('/dashboard/pangkat/create')->with('pangkat_sudah_ada', 'Pangkat ini sudah ada. Mohon isi dengan pangkat yang lain');
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
        return view('dashboard.pangkat.edit', [
            'title' => 'Edit Pangkat',
            'pangkat' => $pangkat,
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
    public function update(Request $request, PangkatUser $pangkatUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PangkatUser  $pangkatUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(PangkatUser $pangkat)
    {
        PangkatUser::destroy($pangkat->id);
        return redirect('/dashboard')->with('pangkat_dihapus', 'Pangkat berhasil dihapus');
    }
}
