<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index(){
        return view('/daftar', [
            'title' => 'Daftar Akun'
        ]);
    }

    public function store(Request $request){
        if (isset($_POST['submit'])) {
            $to = 'myemail@mysite.com'; // changed for security reason. Have been using my acutal email address
            $subject = 'From Rexu Contact Form';
            $echo 'name: ' . $_POST['name'] . "\r\n\r\n";
            $echo 'email: ' . $_POST['email'] . "\r\n\r\n";
            $echo 'tel: ' . $_POST['tel'] . "\r\n\r\n";
            $echo 'message: ' . $_POST['message'];
       }
       

        // $request->validate([
        //     'nama' => 'required|min:3',
        //     'nip' => 'required|min:16',
        //     'username' => 'required|unique:pegawais|min:5',
        //     'password' => 'required|min=5',
        //     'email' => 'required|email:dns',
        //     'tanggal' => 'required',
        // ]);

        // @dd('berhasil');

    }
}
