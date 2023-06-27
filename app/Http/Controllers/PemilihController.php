<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Pemilih;
use App\Models\User;

class PemilihController extends Controller
{
    public function index()
    {
        $datas = User::where('role_id', 2)->get();

        return view('admin.pemilih.index', compact([
            'datas',
        ]));
    }

    public function create(Request $request)
    {
        $username = rand(100000, 999999);
        $password = rand(100000, 999999);

        User::create([
            'name' => $request->nama,
            'asal' => $request->asal,
            'role_id' => 2,
            'username' => $username,
            'pass' => $password,
            'password' => Hash::make($password),
        ]);

        return redirect()->back()->with('status', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }
}
