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
        $get_request = RequestModel::with(['user'])->where('owner', auth()->user()->id)->whereNotIn('aksi', ['terima', 'tolak'])->latest('tanggal_aksi');
        $set_request = RequestModel::with(['user'])->where('user_id', auth()->user()->id)->latest('tanggal_aksi');
        $username = User::all();
        $token = Str::random(20);

        return view('request.index', [
            'title' => 'Manajemen Request',
            'get_requests' => $get_request->paginate(5, ['*'], 'get_request')->withQueryString(),
            'set_requests' => $set_request->paginate(5, ['*'], 'set_request')->withQueryString(),
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

    public function store(Request $request)
    {
        $request['tanggal_aksi'] = now();

        RequestModel::create($request->toArray());
        return redirect('/request')->with('request_added', 'Request Berhasil Dibuat');
    }

    public function update(Request $request)
    {
        $updated_request = array_slice($request->toArray(), 1, count($request->toArray()));
        $updated_request['tanggal_aksi'] = now();

        RequestModel::where('id', $request->id)->update($updated_request);
        if ($updated_request['aksi'] === 'terima') {
            return redirect('/request')->with('request_accepted', 'Request berhasil diterima');
        }
        return redirect('/request')->with('request_rejected', 'Request berhasil ditolak');
    }

    public function token(PangkatUser $pangkat, JabatanUser $jabatan, Request $request)
    {
        return view('request.token', [
            'title' => 'Unduh File',
            'pangkat' => $pangkat,
            'jabatan' => $jabatan,
            'username' => $request->username,
        ]);
    }

    public function download(PangkatUser $pangkat, JabatanUser $jabatan, Request $request)
    {
        $validatedData = $request->validate([
            'token' => 'required|min:20|max:20',
        ]);

        if ($pangkat->token !== $validatedData['token']) {
            return 'TOken ndak sama';
        }
        if (!$pangkat->is_downloaded) {
            return 'Token kadaluarsa';
        }
        return 'silahkan download';
    }
}
