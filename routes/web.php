<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KasBulananController;
use App\Http\Controllers\TransaksiSiswaController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('index'); // Buat view landing sesuai kebutuhan
})->name('landing');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(\App\Http\Middleware\AdminAuth::class)->group(function () {
    // Misalnya, halaman dashboard admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
    Route::get('/kas', [KasController::class, 'index'])->name('kas.index');


    // CRUD untuk pengelolaan admin (bisa diatur di AdminController)
    Route::resource('admin', AdminController::class);
    
    
    
    // Route CRUD Siswa
    Route::resource('siswa', SiswaController::class);
    // Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    // Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    // Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    // Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    // Route CRUD Kas Bulanan
    Route::get('/kasbulanan', [KasBulananController::class, 'index'])->name('kasbulanan.index');
    Route::post('/kasbulanan', [KasBulananController::class, 'store'])->name('kasbulanan.store');
    Route::put('/kasbulanan/{id}', [KasBulananController::class, 'update'])->name('kasbulanan.update');
    Route::delete('/kasbulanan/{id}', [KasBulananController::class, 'destroy'])->name('kasbulanan.destroy');

    // Route Transaksi
    Route::get('/transaksi', [TransaksiSiswaController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create', [TransaksiSiswaController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [TransaksiSiswaController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/{id}/edit', [TransaksiSiswaController::class, 'edit'])->name('transaksi.edit');
    Route::put('/transaksi/{id}', [TransaksiSiswaController::class, 'update'])->name('transaksi.update');
    Route::delete('/transaksi/{id}', [TransaksiSiswaController::class, 'destroy'])->name('transaksi.destroy');
    Route::get('/transaksi/detail/{siswa_id}', [TransaksiSiswaController::class, 'detail'])->name('transaksi.detail');


    // Route pengeluaran
    Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
    Route::post('/pengeluaran', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
    Route::put('/pengeluaran/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');
    Route::delete('/pengeluaran/{id}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');

});



// Route::get('/kas/total', function () {
//     $totalPemasukan = TransaksiSiswa::sum('jumlah'); // Total pemasukan dari kas siswa
//     $totalPengeluaran = Pengeluaran::sum('jumlah'); // Total pengeluaran
//     $totalKas = $totalPemasukan - $totalPengeluaran; // Hitung total kas yang tersedia

//     return response()->json(['total' => $totalKas]);
// })->name('kas.total');


