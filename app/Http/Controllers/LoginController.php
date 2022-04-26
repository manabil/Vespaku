<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required|min:5|regex:/^[a-zA-Z0-9_-]{5,}$/',
            'password' => 'required|min:5',
        ]);

        $credentials['username'] = str_replace('/', '-', openssl_encrypt($credentials['username'], 'AES-128-ECB', 'VESPaKU'));

        if(Auth::attempt($credentials)){
            request()->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('login_error', 'Username atau Password salah');

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
