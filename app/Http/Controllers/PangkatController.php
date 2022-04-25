<?php

namespace App\Http\Controllers;

use App\Models\PangkatUser;
use App\Models\Pangkat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pangkat_search = Pangkat::with(['user']);
        
        if(request('search')){
            $search_pangkat = Pangkat::with(['user'])->latest()->where('nama', 'LIKE', '%' . request('search') . '%')->get();
            $searched_id = collect();

            foreach ($search_pangkat as $pangkat) {
                $searched_id[] = $pangkat->id;
            }

            $pangkat_search = Pangkat::with(['user'])->latest()->whereIn('id', $searched_id);
        }
        
        return view('administrator.pangkat.index', [
            'title' => 'Manajemen Pangkat',
            'pangkats' => $pangkat_search->paginate(10),
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
        return view('administrator.pangkat.create', [
            'title' => 'Tambah Pangkat'
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
            'nama' => 'required|min:5|unique:pangkats',
            'slug' => 'required|min:5|unique:pangkats',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PangkatUser  $pangkatUser
     * @return \Illuminate\Http\Response
     */
    public function show(PangkatUser $pangkat)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PangkatUser  $pangkatUser
     * @return \Illuminate\Http\Response
     */
    public function edit(PangkatUser $pangkat)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PangkatUser  $pangkatUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(PangkatUser $pangkat)
    {
        
    }
}
