<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KasBulanan;

class KasBulananController extends Controller
{
    public function index()
    {
        $kas = KasBulanan::orderBy('tahun', 'desc')->orderBy('id', 'asc')->get();
        return view('kasbulanan.index', compact('kas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required|string|max:20',
            'tahun' => 'required|integer',
            'target' => 'required|integer|min:0',
        ]);

        KasBulanan::create($request->all());

        return redirect()->route('kasbulanan.index')->with('success', 'Kas bulanan berhasil ditambahkan.');
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

        return redirect()->route('kasbulanan.index')->with('success', 'Kas bulanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kas = KasBulanan::findOrFail($id);
        $kas->delete();

        return redirect()->route('kasbulanan.index')->with('success', 'Kas bulanan berhasil dihapus.');
    }
}
