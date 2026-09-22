<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $r)
    {
        $q = $r->query('q');
        $buku = Buku::when($q, fn($query) => $query->where('judul', 'like', "%{$q}%"))
            ->latest()
            ->paginate(10);

        return view('buku', compact('buku', 'q'));
    }

    public function create()
    {
        return view('buku-form', ['buku' => new Buku()]);
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'judul' => ['required', 'string', 'max:255'],
            'penulis' => ['required', 'string', 'max:100'],
            'tahun' => ['required', 'integer', 'between:1900,' . date('Y')],
            'stok' => ['required', 'integer', 'min:0'],
        ]);

        Buku::create($data);
        return redirect()->route('buku.index')->with('ok', 'Buku ditambahkan');
    }

    public function edit(Buku $buku)
    {
        return view('buku-form', compact('buku'));
    }

    public function update(Request $r, Buku $buku)
    {
        $data = $r->validate([
            'judul' => ['required', 'string', 'max:255'],
            'penulis' => ['required', 'string', 'max:100'],
            'tahun' => ['required', 'integer', 'between:1900,' . date('Y')],
            'stok' => ['required', 'integer', 'min:0'],
        ]);

        $buku->update($data);
        return redirect()->route('buku.index')->with('ok', 'Buku diupdate');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return back()->with('ok', 'Buku dihapus');
    }
}