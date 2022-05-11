<?php

namespace App\Http\Controllers;

use App\Models\JabatanUser;
use App\Models\PangkatUser;
use App\Models\Pangkat;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use App\Models\User;
use Illuminate\Support\Str;

class RequestController extends Controller
{
    public function index()
    {
        $get_request = RequestModel::where('owner', auth()->user()->id)->get();
        $set_request = RequestModel::where('user_id', auth()->user()->id)->get();
        $username = User::all();
        $token = Str::random(20);

        return view('request.index', [
            'title' => 'Manajemen Request',
            'get_requests' => $get_request,
            'set_requests' => $set_request,
            'username' => $username,
            'token' => $token
        ]);
    }

    public function create(PangkatUser $pangkat, JabatanUser $jabatan, Request $request)
    {
        return view('request.create', [
            'title' => 'Request File',
            'pangkat' => $pangkat,
            'jabatan' => $jabatan,
            'username' => $request->username
        ]);
    }

    public function store(PangkatUser $pangkat, JabatanUser $jabatan, Request $request)
    {
        $request['tanggal_aksi'] = now();

        RequestModel::create($request->toArray());
        return redirect('/request')->with('request_added', 'Request Berhasil Dibuat');
    }

    public function update(Request $request, PangkatUser $pangkat)
    {
        $updated_request = array_slice($request->toArray(), 1, count($request->toArray()));
        $updated_request['tanggal_aksi'] = now();

        RequestModel::where('id', $request->id)->update($updated_request);
        return redirect('/request')->with('request_accepted', 'Request diterima');
    }

    public function token(PangkatUser $pangkat, JabatanUser $jabatan, Request $request)
    {
        return view('request.token', [
            'title' => 'Unduh File',
            'pangkat' => $pangkat,
            'username' => $request->username,
        ]);
    }
}
