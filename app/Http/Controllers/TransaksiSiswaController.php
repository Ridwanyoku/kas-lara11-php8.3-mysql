<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiSiswa;
use App\Models\Siswa;
use App\Models\KasBulanan;

class TransaksiSiswaController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
    
        $query = TransaksiSiswa::with(['siswa', 'kasBulanan']);
    
        // Filter berdasarkan bulan (jika diisi)
        if ($bulan) {
            $query->whereHas('kasBulanan', function($q) use ($bulan) {
                $q->where('bulan', $bulan);
            });
        }
    
        // Filter berdasarkan tahun (jika diisi)
        if ($tahun) {
            $query->whereHas('kasBulanan', function($q) use ($tahun) {
                $q->where('tahun', $tahun);
            });
        }
    
        $transaksi = $query->orderBy('updated_at', 'desc')->get();
        $siswa = Siswa::all();
        $kasBulanan = KasBulanan::all();
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 
            6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 
            11 => 'November', 12 => 'Desember'
        ];
        $years = KasBulanan::select('tahun')->distinct()->orderBy('tahun')->pluck('tahun');
    
        return view('transaksi.index', compact('transaksi', 'siswa', 'kasBulanan', 'months', 'years', 'bulan', 'tahun'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'bulan' => 'required|string',
            'tahun' => 'required|integer',
            'jumlah' => 'required|numeric|min:1',
        ]);

        $kasBulanan = KasBulanan::where('bulan', strtolower($request->bulan))
                        ->where('tahun', $request->tahun)
                        ->first();

        if (!$kasBulanan) {
            return redirect()->back()->with('error', 'Data kas bulanan untuk periode ini tidak ditemukan.');
        }

        $totalPembayaran = TransaksiSiswa::where('siswa_id', $request->siswa_id)
                            ->where('kas_bulanan_id', $kasBulanan->id)
                            ->sum('jumlah');

        if (($totalPembayaran + $request->jumlah) > $kasBulanan->target) {
            return redirect()->back()->with('error', 'Pembayaran melebihi target. Target untuk periode ini adalah Rp ' . number_format($kasBulanan->target, 0, ',', '.'));
        }

        TransaksiSiswa::create([
            'siswa_id' => $request->siswa_id,
            'kas_bulanan_id' => $kasBulanan->id,
            'jumlah' => $request->jumlah,
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
        $transaksi = TransaksiSiswa::findOrFail($id);
        $transaksi->update(['jumlah' => $request->jumlah]);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }
    
    public function destroy($id)
    {
        TransaksiSiswa::findOrFail($id)->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }

    public function detail($siswa_id)
{
    // Ambil data siswa
    $siswa = Siswa::findOrFail($siswa_id);

    // Ambil semua transaksi untuk siswa ini, termasuk kas_bulanan
    $transactions = TransaksiSiswa::with('kasBulanan')
        ->where('siswa_id', $siswa_id)
        ->get()
        ->groupBy(function ($transaksi) {
            return $transaksi->kasBulanan->tahun . '-' . $transaksi->kasBulanan->bulan;
        });

    return view('transaksi.detail', compact('siswa', 'transactions'));
}

}
