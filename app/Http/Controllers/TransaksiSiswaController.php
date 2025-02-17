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
        'siswa_id'       => 'required|exists:siswa,id',
        'kas_bulanan_id' => 'required|exists:kas_bulanan,id',
        'jumlah'         => 'required|numeric|min:1',
        'tanggal_bayar'  => 'required|date'
    ]);

    // Ambil data target dari tabel kas_bulanan
    $kasBulanan = \App\Models\KasBulanan::find($request->kas_bulanan_id);
    if (!$kasBulanan) {
        return redirect()->back()->with('error', 'Data kas bulanan tidak ditemukan.');
    }

    // Cek apakah sudah ada transaksi untuk siswa ini pada periode yang sama
    $existingTransaction = \App\Models\TransaksiSiswa::where('siswa_id', $request->siswa_id)
                        ->where('kas_bulanan_id', $request->kas_bulanan_id)
                        ->first();
    if ($existingTransaction) {
        return redirect()->back()->with('error', 'Siswa sudah melakukan pembayaran untuk periode ini. Silakan update transaksi jika ingin menambah pembayaran.');
    }

    // Hitung total pembayaran siswa pada periode ini
    $totalPaid = \App\Models\TransaksiSiswa::where('siswa_id', $request->siswa_id)
                    ->where('kas_bulanan_id', $request->kas_bulanan_id)
                    ->sum('jumlah');

    // Validasi bahwa pembayaran yang akan dibuat tidak melebihi target
    if (($totalPaid + $request->jumlah) > $kasBulanan->target) {
        return redirect()->back()->with('error', 'Pembayaran melebihi target. Target untuk periode ini adalah Rp ' . number_format($kasBulanan->target, 0, ',', '.'));
    }

    \App\Models\TransaksiSiswa::create([
        'siswa_id'       => $request->siswa_id,
        'kas_bulanan_id' => $request->kas_bulanan_id,
        'jumlah'         => $request->jumlah,
        'tanggal_bayar'  => $request->tanggal_bayar,
    ]);

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
            'siswa_id'       => 'required|exists:siswa,id',
            'kas_bulanan_id' => 'required|exists:kas_bulanan,id',
            'jumlah'         => 'required|numeric|min:1',
            'tanggal_bayar'  => 'required|date'
        ]);
    
        $transaksi = \App\Models\TransaksiSiswa::findOrFail($id);
        $kasBulanan = \App\Models\KasBulanan::find($request->kas_bulanan_id);
    
        if (!$kasBulanan) {
            return redirect()->back()->with('error', 'Data kas bulanan tidak ditemukan.');
        }
    
        // Hitung total pembayaran untuk periode ini, kecuali transaksi yang sedang diedit
        $totalPaidExcludingCurrent = \App\Models\TransaksiSiswa::where('siswa_id', $request->siswa_id)
                                        ->where('kas_bulanan_id', $request->kas_bulanan_id)
                                        ->where('id', '!=', $id)
                                        ->sum('jumlah');
    
        // Jika total pembayaran (selain transaksi ini) sudah mencapai target, maka tidak boleh menambah pembayaran lagi
        if ($totalPaidExcludingCurrent >= $kasBulanan->target) {
            return redirect()->back()->with('error', 'Pembayaran untuk periode ini sudah lunas.');
        }
    
        // Jika penambahan transaksi baru menyebabkan total melebihi target
        if (($totalPaidExcludingCurrent + $request->jumlah) > $kasBulanan->target) {
            return redirect()->back()->with('error', 'Pembayaran melebihi target. Target untuk periode ini adalah Rp ' . number_format($kasBulanan->target, 0, ',', '.'));
        }
    
        $transaksi->update($request->all());
    
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }
    
    

    public function destroy($id)
    {
        TransaksiSiswa::findOrFail($id)->delete();
    
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
