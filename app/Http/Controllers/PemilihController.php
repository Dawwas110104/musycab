<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilih;
use App\Models\User;

class PemilihController extends Controller
{
    public function index()
    {
        $datas = Pemilih::all();

        return view('admin.pemilih.index', compact([
            'datas',
        ]));
    }

    public function create(Request $request)
    {
        $username = rand(100000, 999999);
        $password = rand(100000, 999999);

        Pemilih::create([
            'nama' => $request->nama,
            'asal' => $request->asal,
            'username' => $username,
            'password' => $password,
        ]);

        User::create([
            'name' => $request->nama,
            'role_id' => 2,
            'username' => $username,
            'password' => $password,
        ]);

        return redirect()->back()->with('status', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Pemilih::where('id', $id)->delete();

        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }
}
