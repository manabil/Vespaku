<?php

namespace App\Http\Controllers;

use App\Models\PangkatUser;
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

        return view('request', [
            'title' => 'Manajemen Request',
            'get_requests' => $get_request,
            'set_requests' => $set_request,
            'username' => $username,
            'token' => $token
        ]);
    }

    public function action(Request $request, PangkatUser $pangkat)
    {
        return $pangkat;
        RequestModel::where('id', $pangkat->id)->update($validatedData);
        return redirect('/request')->with('request_accepted', 'Request diterima');
    }

    public function reject(Request $request)
    {
        RequestModel::create($request);
        return redirect('/request')->with('request_rejected', 'Request ditolak');
    }
}
