<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiSiswa;
use App\Models\Siswa;
use App\Models\KasBulanan;

class TransaksiSiswaController extends Controller
{
    public function index()
{
    $transaksi = TransaksiSiswa::with(['siswa', 'kasBulanan'])->get();
    $siswa = Siswa::all(); // Tambahkan ini agar $siswa tersedia di view
    $kasBulanan = KasBulanan::all(); // Tambahkan ini agar $kasBulanan tersedia di view

    return view('transaksi.index', compact('transaksi', 'siswa', 'kasBulanan'));
}


    public function create()
    {
        $siswa = Siswa::all();
        $kasBulanan = KasBulanan::all();
        return view('transaksi.create', compact('siswa', 'kasBulanan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'kas_bulanan_id' => 'required|exists:kas_bulanan,id',
            'jumlah' => 'required|numeric|min:1'
        ]);
    
        TransaksiSiswa::create($request->all());
    
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $transaksi = TransaksiSiswa::findOrFail($id);
        $siswa = Siswa::all();
        $kasBulanan = KasBulanan::all();
        return view('transaksi.edit', compact('transaksi', 'siswa', 'kasBulanan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|numeric|min:1'
        ]);
    
        $transaksi = TransaksiSiswa::findOrFail($id);
        $transaksi->update($request->all());
    
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui');
    }
    

    public function destroy($id)
    {
        TransaksiSiswa::findOrFail($id)->delete();
    
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
