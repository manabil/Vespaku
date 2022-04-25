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
        return view('administrator.jabatan.index', [
            'title' => 'Manajemen Jabatan',
            'jabatans' => Jabatan::paginate(10),
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
     * @param  \App\Models\JabatanUser  $jabatanUser
     * @return \Illuminate\Http\Response
     */
    public function show(JabatanUser $jabatan)
    {
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
