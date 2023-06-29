<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formatur;

class GuestController extends Controller
{

    public function index()
    {
        $datas = Formatur::all();
        return view('guest.index', compact([
            'datas'
        ]));
    }
    }

