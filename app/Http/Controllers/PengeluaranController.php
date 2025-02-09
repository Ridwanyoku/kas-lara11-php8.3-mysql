<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\TransaksiSiswa;


class PengeluaranController extends Controller
{
    // Tampilkan daftar pengeluaran
    public function index()
    {
        $pengeluaran = Pengeluaran::orderBy('tanggal_pengeluaran', 'desc')->get();
        $totalpengeluaran = Pengeluaran::sum('jumlah');

        return view('pengeluaran.index', compact('pengeluaran', 'totalpengeluaran'));
    }



public function store(Request $request)
{
    $request->validate([
        'deskripsi' => 'required|string|max:255',
        'jumlah' => 'required|integer|min:1',
        'tanggal_pengeluaran' => 'required|date',
    ]);

    // Hitung total kas saat ini
    $totalPemasukan = TransaksiSiswa::sum('jumlah'); 
    $totalPengeluaran = Pengeluaran::sum('jumlah'); 
    $totalKas = $totalPemasukan - $totalPengeluaran;

    // Cek apakah pengeluaran melebihi saldo kas
    if ($request->jumlah > $totalKas) {
        return redirect()->back()->with('error', 'Pengeluaran melebihi total kas yang tersedia!');
    }

    // Simpan pengeluaran jika valid
    Pengeluaran::create($request->all());

    return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil ditambahkan.');
}


    // Update pengeluaran
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'deskripsi' => 'required|string|max:255',
    //         'jumlah' => 'required|integer|min:1',
    //         'tanggal_pengeluaran' => 'required|date',
    //     ]);

    //     $pengeluaran = Pengeluaran::findOrFail($id);
    //     $pengeluaran->update($request->all());

    //     return redirect()->back()->with('success', 'Pengeluaran berhasil diperbarui.');
    // }

    public function update(Request $request, $id)
    {
    $request->validate([
        'deskripsi' => 'required|string|max:255',
        'jumlah' => 'required|integer|min:1',
        'tanggal_pengeluaran' => 'required|date',
    ]);

    $pengeluaran = Pengeluaran::findOrFail($id);

    // Hitung total kas sebelum update
    $totalPemasukan = TransaksiSiswa::sum('jumlah'); 
    $totalPengeluaran = Pengeluaran::where('id', '!=', $id)->sum('jumlah'); // Kecuali yang sedang diedit
    $totalKas = $totalPemasukan - $totalPengeluaran;

    // Validasi jika jumlah baru lebih besar dari total kas
    if ($request->jumlah > $totalKas) {
        return redirect()->back()->with('error', 'Pengeluaran melebihi total kas yang tersedia!');
    }

    // Update pengeluaran jika valid
    $pengeluaran->update($request->all());

    return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil diperbarui.');
    }


    // Hapus pengeluaran
    public function destroy($id)
    {
        Pengeluaran::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Pengeluaran berhasil dihapus.');
    }
}
