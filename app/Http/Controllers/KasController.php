<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiSiswa;
use App\Models\Siswa;
use App\Models\KasBulanan;
use DB;

class KasController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tahun dari request (default: tahun sekarang)
        $tahun = $request->input('tahun', date('Y'));

        // Ambil daftar tahun unik dari kas_bulanan untuk dropdown
        $years = KasBulanan::select('tahun')->distinct()->orderBy('tahun')->pluck('tahun');

        // Ambil total kas per siswa berdasarkan tahun tertentu
        $kasSiswa = Siswa::select('siswa.id', 'siswa.nama')
            ->leftJoin('transaksi_siswa', 'siswa.id', '=', 'transaksi_siswa.siswa_id')
            ->leftJoin('kas_bulanan', 'transaksi_siswa.kas_bulanan_id', '=', 'kas_bulanan.id')
            ->where('kas_bulanan.tahun', $tahun)
            ->groupBy('siswa.id', 'siswa.nama')
            ->selectRaw('COALESCE(SUM(transaksi_siswa.jumlah), 0) as total_kas')
            ->get();

        return view('kas.index', compact('kasSiswa', 'years', 'tahun'));
    }
}
