<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Formatur;
use App\Models\Pilihan;

class GuestController extends Controller
{

    public function index()
    {
        $datas = Formatur::all();
        return view('guest.index', compact([
            'datas'
        ]));
    }

    public function pilih(Request $request)
    {
        foreach ($request->category as $value){
            Pilihan::create([
                'dari' => Auth::user()->id,
                'untuk' => $value,
            ]);
        }

        return redirect()->route('terimakasih')->with('status', 'Terimakasih telah memilih!');
    }

    public function terimakasih()
    {
        return view('guest.terimakasih');
    }
}

