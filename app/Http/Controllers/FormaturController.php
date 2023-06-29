<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Formatur;

class FormaturController extends Controller
{
    public function index()
    {
        $datas = Formatur::all();

        return view('admin.formatur.index', compact([
            'datas',
        ]));
    }

    public function create(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        if ($image = $request->file('foto')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            // $input['image'] = "$profileImage";
        }
    
        Formatur::create([
            'nama' => $request->nama,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'image' => $profileImage,
        ]);

        return redirect()->route('formatur.index')->with('status', 'Data berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        Formatur::where('id', $id)->delete();

        return redirect()->route('formatur.index')->with('status', 'Data berhasil dihapus!');
    }

    public function detail($id)
    {
        $data = Formatur::where('id', $id)->first();

        // return $data;
        return view('admin.formatur.detail', compact(
            'data'
        ));
    }
}
