<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as RequestModel;

class RequestController extends Controller
{
    public function index(){
        return RequestModel::all();
        return view('request', [
            'title' => 'Manajemen Request'
        ]);
    }
}
