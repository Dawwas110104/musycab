<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'asal',
        'role_id',
        'username',
        'pass',
        'status',
    ];
}
