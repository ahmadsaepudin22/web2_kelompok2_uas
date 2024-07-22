<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KandidatController extends Controller
{
    public function index()
    {
        $kandidats = Kandidat::all();
        $kategoris = Kategori::all();

        return view('admin.kandidat.index', compact('kandidats', 'kategoris'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.kandidat.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk foto
            'kategori_id' => 'required|exists:kategoris,id' // Validasi untuk kategori_id
        ]);

        $kandidats = new Kandidat();

        $kandidats->name = $request->name;
        $kandidats->description = $request->description;
        $kandidats->kategori_id = $request->kategori_id;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/images/');
            $kandidats->photo = basename($path);
        }


        $kandidats->save();

        return redirect()->route('admin.kandidat.index')->with('success', 'Kandidat Ditambahkan');
    }

    public function edit($id)
    {
        $kategoris = Kategori::all();
        $kandidats = Kandidat::findOrFail($id); // Cari kandidat berdasarkan ID, gagal jika tidak ditemukan
        return view('admin.kandidat.edit', compact('kandidats', 'kategoris')); // Tampilkan view edit dengan data kandidat
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori_id' => 'required|exists:kategoris,id'
        ]);

        $kandidats = Kandidat::findOrFail($id);

        $kandidats->name = $request->name;
        $kandidats->description = $request->description;
        $kandidats->kategori_id = $request->kategori_id;

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($kandidats->photo && Storage::exists('public/images/' . $kandidats->photo)) {
                Storage::delete('public/images/' . $kandidats->photo);
            }

            // Simpan foto baru
            $path = $request->file('photo')->store('public/images');
            $kandidats->photo = basename($path);
        }

        $kandidats->save();

        return redirect()->route('admin.kandidat.index')->with('success', 'Kandidat Diubah');
    }

    public function show($id)
    {
        $kandidats = Kandidat::findOrFail($id); // Cari kandidat berdasarkan ID, gagal jika tidak ditemukan
        return view('admin.kandidat.show', compact('Kandidats')); // Tampilkan view edit dengan data kandidat
    }

    public function destroy($id)
    {
        $kandidats = Kandidat::find($id);
        if ($kandidats) {
            $kandidats->delete();
            return redirect()->route('admin.kandidat.index')->with('success', 'Kandidat Dihapus');
        }
        return back()->with('error', 'Kandidat tidak ada');
    }
}
