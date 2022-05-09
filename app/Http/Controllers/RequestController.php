<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use App\Models\User;

class RequestController extends Controller
{
    public function index(){
        $request = RequestModel::where('owner', auth()->user()->id)->get();
        $user = User::with(['jabatan', 'pangkat', 'request']);

        return view('request', [
            'title' => 'Manajemen Request',
            'requests' => $request,
        ]);
    }
}
