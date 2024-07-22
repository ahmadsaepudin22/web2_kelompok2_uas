<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Kategori;
use App\Models\Pemilihan;
use Illuminate\Http\Request;

class PemilihanController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::with('kandidats')->get();
        $userPemilihans = Pemilihan::where('user_id', auth()->id())->get()->groupBy('kandidat.kategori_id');

        return view('user.index', compact('kategoris', 'userPemilihans'));
    }

    public function store(Request $request)
    {
        $kandidat = Kandidat::findOrFail($request->kandidat_id);

        $pemilihanExists = Pemilihan::where('user_id', auth()->id())
            ->whereHas('kandidat', function ($query) use ($kandidat) {
                $query->where('kategori_id', $kandidat->kategori_id);
            })
            ->exists();

        if ($pemilihanExists) {
            return redirect()->back()->with('error', 'Anda sudah memilih');
        }

        Pemilihan::create([
            'user_id' => auth()->id(),
            'kandidat_id' => $request->kandidat_id,
        ]);

        return redirect()->route('user.index')->with('success', 'Anda sudah memilih');
    }

    public function show($id)
    {
        $kandidats = Kandidat::findOrFail($id);
        return view('voter.show', compact('kandidats'));
    }

    public function results(Request $request)
    {
        $selectedKategoriId = $request->get('kategori_id');
        $kategoris = Kategori::all();

        $selectedKategori = null;
        if ($selectedKategoriId) {
            $selectedKategori = Kategori::with(['kandidats' => function ($query) {
                $query->withCount('pemilihans');
            }])->find($selectedKategoriId);
        }

        return view('hasil', compact('kategoris', 'selectedKategori', 'selectedKategoriId'));
    }

    public function history()
    {
        $pemilihans = Pemilihan::with(['user', 'kandidat.kategori'])->orderBy('created_at', 'desc')->get();
        return view('admin.hasil.riwayat', compact('pemilihans'));
    }
}
