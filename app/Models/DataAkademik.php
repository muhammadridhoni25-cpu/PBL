<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataAkademik extends Model
{
    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'ipk',
        'ips',
    ];
}