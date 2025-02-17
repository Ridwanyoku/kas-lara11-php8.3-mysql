<?php

use App\Models\TransaksiSiswa;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KasBulananController;
use App\Http\Controllers\TransaksiSiswaController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index'); // Buat view landing sesuai kebutuhan
})->name('landing');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(\App\Http\Middleware\AdminAuth::class)->group(function () {
    // Misalnya, halaman dashboard admin

    // CRUD untuk pengelolaan admin (bisa diatur di AdminController)
    Route::resource('admin', AdminController::class);
    
    
    
    // Route CRUD Siswa
    Route::resource('siswa', SiswaController::class);
    // Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    // Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    // Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    // Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    // Route CRUD Kas Bulanan
    Route::get('/kas', [KasBulananController::class, 'index'])->name('kas.index');
    Route::post('/kas', [KasBulananController::class, 'store'])->name('kas.store');
    Route::put('/kas/{id}', [KasBulananController::class, 'update'])->name('kas.update');
    Route::delete('/kas/{id}', [KasBulananController::class, 'destroy'])->name('kas.destroy');

    // Route Transaksi
    Route::get('/transaksi', [TransaksiSiswaController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create', [TransaksiSiswaController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [TransaksiSiswaController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/{id}/edit', [TransaksiSiswaController::class, 'edit'])->name('transaksi.edit');
    Route::put('/transaksi/{id}', [TransaksiSiswaController::class, 'update'])->name('transaksi.update');
    Route::delete('/transaksi/{id}', [TransaksiSiswaController::class, 'destroy'])->name('transaksi.destroy');

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


