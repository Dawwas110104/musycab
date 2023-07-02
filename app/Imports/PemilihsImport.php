<?php

namespace App\Imports;

use App\Models\Pemilih;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class PemilihsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $username = rand(100000, 999999);
        $password = rand(100000, 999999);

        User::create([
            'name' => $row[0],
            'asal' => $row[1],
            'role_id' => 2,
            'username' => $username,
            'pass' => $password,
            'password' => Hash::make($password),
            'status' => 1,
        ]);

        return new Pemilih([
            'nama' => $row[0],
            'asal' => $row[1],
            'username' => $username,
            'pass' => $password,
            'status' => 1,
        ]);
    }
}
