<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|string|unique:mahasiswas,nim',
            'nama' => 'required|string',
            'prodi' => 'required|string',
            'ipk' => 'required|numeric',
            'ips' => 'required|numeric',
            'nilai_keaktifan' => 'required|numeric',
        ]);

        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.create')->with('sukses', 'data mahasiswa berhasil ditambahkan');
    }
}