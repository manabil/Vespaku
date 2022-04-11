<?php

namespace App\Http\Controllers;

use App\Models\PangkatUser;
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
    public function edit(PangkatUser $pangkatUser)
    {
        //
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
    public function destroy(PangkatUser $pangkatUser)
    {
        //
    }
}
