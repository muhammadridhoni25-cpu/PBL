<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Portofolio;
use Illuminate\Support\Facades\Storage;
 
class PortofolioController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::all();
        return view('portofolio.index', compact('portofolios'));
    }
 
    public function create()
    {
        return view('portofolio.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'kategori'      => 'required|string|max:100',
            'file_berkas'   => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
 
        $path = $request->file('file_berkas')->store('portofolio', 'public');
 
        Portofolio::create([
            'id_mahasiswa'  => 1,
            'nama_prestasi' => $request->nama_prestasi,
            'kategori'      => $request->kategori,
            'file_berkas'   => $path,
        ]);
 
        return redirect()->route('portofolio.create')->with('sukses', 'berkas prestasi berhasil diunggah.');
    }
 
    public function edit($id)
    {
        $portofolio = Portofolio::findOrFail($id);
        return view('portofolio.edit', compact('portofolio'));
    }
 
    public function update(Request $request, $id)
    {
        $portofolio = Portofolio::findOrFail($id);
 
        $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'kategori'      => 'required|string|max:100',
            'file_berkas'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
 
        $data = [
            'nama_prestasi' => $request->nama_prestasi,
            'kategori'      => $request->kategori,
        ];
 
        if ($request->hasFile('file_berkas')) {
            if ($portofolio->file_berkas && Storage::disk('public')->exists($portofolio->file_berkas)) {
                Storage::disk('public')->delete($portofolio->file_berkas);
            }
            $data['file_berkas'] = $request->file('file_berkas')->store('portofolio', 'public');
        }
 
        $portofolio->update($data);
 
        return redirect()->route('portofolio.index')->with('sukses', 'berkas prestasi berhasil diperbarui.');
    }
 
    public function destroy($id)
    {
        $portofolio = Portofolio::findOrFail($id);
 
        if ($portofolio->file_berkas && Storage::disk('public')->exists($portofolio->file_berkas)) {
            Storage::disk('public')->delete($portofolio->file_berkas);
        }
 
        $portofolio->delete();
 
        return redirect()->back()->with('sukses', 'berkas berhasil dihapus.');
    }
}
 