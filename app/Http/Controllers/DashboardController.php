<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiSiswa;
use App\Models\KasBulanan;
use App\Models\Pengeluaran;

class DashboardController extends Controller
{
    

    public function index()
{
    $saldoKas = TransaksiSiswa::sum('jumlah') - Pengeluaran::sum('jumlah');
    $totalPemasukan = TransaksiSiswa::sum('jumlah');
    $totalPengeluaran = Pengeluaran::sum('jumlah');

    $targetBulanan = KasBulanan::orderBy('tahun', 'desc')
        ->orderBy('bulan', 'desc')
        ->limit(4)
        ->get();

    $transaksiTerbaru = TransaksiSiswa::with('siswa')
        ->orderBy('updated_at', 'desc')
        ->limit(4)
        ->get();

    $pengeluaranTerbaru = Pengeluaran::orderBy('created_at', 'desc')
        ->limit(4)
        ->get(); // 🔹 Tambahkan ini

    return view('dashboard.index', compact(
        'saldoKas', 
        'totalPemasukan', 
        'totalPengeluaran', 
        'targetBulanan', 
        'transaksiTerbaru',
        'pengeluaranTerbaru' // 🔹 Kirim ke Blade
    ));
}


}


