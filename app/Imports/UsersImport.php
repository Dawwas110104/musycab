<?php

namespace App\Imports;

use App\Models\Formatur;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Formatur([
            'nama' =>$row[0],
        ]);
    }
}
