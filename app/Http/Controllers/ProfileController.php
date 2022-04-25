<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('dashboard.profile.index', [
            'title' => 'Profil Saya',
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {

    }
}
