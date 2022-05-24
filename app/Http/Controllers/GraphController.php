<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Request as RequestModel;

class GraphController extends Controller
{
    public function index()
    {
        $user_search = User::with(['pangkat', 'jabatan']);

        if (request('search')) {
            $search_user = $user_search->latest()->where('nama', 'LIKE', '%' . request('search') . '%')->get();
            $searched_id = collect();

            foreach ($search_user as $user) {
                $searched_id[] = $user->id;
            }

            $user_search = User::with(['pangkat', 'jabatan'])->latest()->whereIn('id', $searched_id);
        }

        return view('graph', [
            'title' => 'Visualisasi Pegawai',
            'pegawai' => $user_search->paginate(10)->withQueryString(),
            // 'notification' => RequestModel::where('owner', auth()->user()->id)->where('readed', '0') 
        ]);
    }
}
