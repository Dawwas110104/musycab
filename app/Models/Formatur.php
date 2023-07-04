<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formatur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'ttl',
        'asal',
        'bidang',
        'telp',
        'email',
        'riwayat',
        'visi',
        'misi',
        'image',
    ];
}
