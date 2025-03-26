<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KasBulanan;

class KasBulananController extends Controller
{
public function index(Request $request)
{
    // Ambil daftar tahun yang tersedia di database
    $years = KasBulanan::select('tahun')->distinct()->pluck('tahun');

    // Ambil tahun yang dipilih, default ke tahun terbaru jika tidak dipilih
    $tahun = $request->query('tahun', $years->max()); 

    // Ambil target bulanan berdasarkan tahun yang dipilih
    $target = KasBulanan::where('tahun', $tahun)->orderBy('bulan')->get();

    return view('kasbulanan.index', compact('years', 'tahun', 'target'));
}


    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required|string|max:20',
            'tahun' => 'required|integer',
            'target' => 'required|integer|min:0',
        ]);

        KasBulanan::create($request->all());

        return redirect()->route('kasbulanan.index')->with('success', 'target Kas bulanan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bulan' => 'required|string|max:20',
            'tahun' => 'required|integer',
            'target' => 'required|integer|min:0',
        ]);

        $kas = KasBulanan::findOrFail($id);
        $kas->update($request->all());

        return redirect()->route('kasbulanan.index')->with('success', 'target Kas bulanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kas = KasBulanan::findOrFail($id);
        $kas->delete();

        return redirect()->route('kasbulanan.index')->with('success', 'target Kas bulanan berhasil dihapus.');
    }
}
