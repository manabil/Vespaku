<?php

namespace App\Http\Controllers;

use App\Models\JabatanUser;
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
    public function destroy(JabatanUser $jabatanUser)
    {
        //
    }
}
