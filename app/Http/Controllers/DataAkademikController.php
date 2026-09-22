<?php

namespace App\Http\Controllers;

use App\Models\DataAkademik;
use Illuminate\Http\Request;

class DataAkademikController extends Controller
{
    public function index()
    {
        $dataAkademik = DataAkademik::latest()->get();

        return view('tendik.data-akademik', compact('dataAkademik'));
    }

    public function create()
    {
        $dataAkademik = new DataAkademik();

        return view('tendik.data-akademik-form', compact('dataAkademik'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|string|max:20',
            'nama_mahasiswa' => 'required|string|max:255',
            'ipk' => 'required|numeric|min:0|max:4',
            'ips' => 'required|numeric|min:0|max:4',
        ]);

        DataAkademik::create($data);

        return redirect()->route('data-akademik.index')
            ->with('success', 'Data akademik berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $dataAkademik = DataAkademik::findOrFail($id);

        return view('tendik.data-akademik-form', compact('dataAkademik'));
    }

    public function update(Request $request, string $id)
    {
        $dataAkademik = DataAkademik::findOrFail($id);

        $data = $request->validate([
            'nim' => 'required|string|max:20',
            'nama_mahasiswa' => 'required|string|max:255',
            'ipk' => 'required|numeric|min:0|max:4',
            'ips' => 'required|numeric|min:0|max:4',
        ]);

        $dataAkademik->update($data);

        return redirect()->route('data-akademik.index')
            ->with('success', 'Data akademik berhasil diubah.');
    }

    public function destroy(string $id)
    {
        $dataAkademik = DataAkademik::findOrFail($id);

        $dataAkademik->delete();

        return redirect()->route('data-akademik.index')
            ->with('success', 'Data akademik berhasil dihapus.');
    }
}