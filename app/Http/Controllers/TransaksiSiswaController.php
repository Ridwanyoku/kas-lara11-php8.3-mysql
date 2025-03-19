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
        // Ambil parameter filter dari request
        $bulan = $request->input('bulan'); // ekspektasi: angka 1-12 atau kosong
        $tahun = $request->input('tahun'); // ekspektasi: integer tahun atau kosong

        // Mulai query transaksi dengan relasi siswa dan kasBulanan
        $query = TransaksiSiswa::with(['siswa', 'kasBulanan']); 

        // Jika kedua filter (bulan dan tahun) diberikan, filter transaksi berdasarkan periode tersebut
        if ($bulan && $tahun) {
            $query->whereHas('kasBulanan', function($q) use ($bulan, $tahun) {
                $q->where('bulan', $bulan)
                  ->where('tahun', $tahun);
            });
        }
        
        
        $transaksi = $query->orderBy('updated_at', 'desc')->get();

        // Ambil semua data siswa dan kasBulanan untuk keperluan form tambah transaksi
        $siswa = Siswa::all();
        $kasBulanan = KasBulanan::all();

        // Buat array bulan untuk dropdown filter
        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        // Ambil daftar tahun unik dari kas_bulanan (urutkan naik)
        $years = KasBulanan::select('tahun')->distinct()->orderBy('tahun')->pluck('tahun');

        return view('transaksi.index', compact('transaksi', 'siswa', 'kasBulanan', 'months', 'years', 'bulan', 'tahun'));
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
            'siswa_id'      => 'required|exists:siswa,id',
            'bulan'         => 'required|string',
            'tahun'         => 'required|integer',
            'jumlah'        => 'required|numeric|min:1',
        ]);

        // Cari record kas_bulanan berdasarkan bulan dan tahun (pastikan bulan disimpan lowercase)
        $kasBulanan = KasBulanan::where('bulan', strtolower($request->bulan))
                        ->where('tahun', $request->tahun)
                        ->first();

        if (!$kasBulanan) {
            return redirect()->back()->with('error', 'Data kas bulanan untuk periode ini tidak ditemukan.');
        }

        // Cek apakah sudah ada transaksi untuk siswa ini pada periode yang sama
        $existingTransaction = TransaksiSiswa::where('siswa_id', $request->siswa_id)
                                ->where('kas_bulanan_id', $kasBulanan->id)
                                ->first();

        if ($existingTransaction) {
            // Jika sudah ada, tambahkan jumlah pembayaran baru ke transaksi yang sudah ada
            $newTotal = $existingTransaction->jumlah + $request->jumlah;

            // Validasi: jika total melebihi target, tampilkan error
            if ($newTotal > $kasBulanan->target) {
                return redirect()->back()->with('error', 'Pembayaran melebihi target. Target untuk periode ini adalah Rp ' . number_format($kasBulanan->target, 0, ',', '.'));
            }

            // Update transaksi dengan jumlah baru dan update tanggal bayar (opsional, bisa diupdate ke tanggal pembayaran terbaru)
            $existingTransaction->update([
                'jumlah' => $newTotal,
                'tanggal_bayar' => $request->tanggal_bayar,
            ]);

            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui (ditambahkan cicilan).');
        }

        // Jika belum ada transaksi, buat transaksi baru
        if ($request->jumlah > $kasBulanan->target) {
            return redirect()->back()->with('error', 'Pembayaran melebihi target. Target untuk periode ini adalah Rp ' . number_format($kasBulanan->target, 0, ',', '.'));
        }

        TransaksiSiswa::create([
            'siswa_id'       => $request->siswa_id,
            'kas_bulanan_id' => $kasBulanan->id,
            'jumlah'         => $request->jumlah,
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
    $transaksi = \App\Models\TransaksiSiswa::findOrFail($id);
    $data = [
        'jumlah' => $request->jumlah,
    ];
    $transaksi->update($data);

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

    // Ambil semua transaksi untuk siswa tersebut, beserta relasi kasBulanan
    $transactions = TransaksiSiswa::with('kasBulanan')
                        ->where('siswa_id', $siswa_id)
                        ->get();

    // Urutkan transaksi berdasarkan tahun dan bulan (terbaru ke terlama)
    // Karena kolom bulan disimpan sebagai string (misal "januari"),
    // kita bisa mengurutkan dengan menggunakan kasBulanan->tahun desc 
    // dan jika ada kolom bulan_nomor, gunakan itu. Jika tidak, kita asumsikan urutan berdasarkan id kasBulanan.
    $transactions = $transactions->sortByDesc(function($t) {
        // Gunakan kombinasi tahun dan id sebagai proxy urutan
        return $t->kasBulanan->tahun . '-' . $t->kasBulanan->id;
    });

    return view('transaksi.detail', compact('siswa', 'transactions'));  
    }

}
