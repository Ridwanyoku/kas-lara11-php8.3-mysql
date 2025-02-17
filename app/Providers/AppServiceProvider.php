<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\TransaksiSiswa;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        // Hitung total pemasukan dari transaksi siswa
        $totalPemasukan = TransaksiSiswa::sum('jumlah');
        // Hitung total pengeluaran
        $totalPengeluaran = Pengeluaran::sum('jumlah');
        // Total kas adalah pemasukan dikurangi pengeluaran
        $totalKas = $totalPemasukan - $totalPengeluaran;

        // Share variabel ke semua view
        View::share('totalKas', $totalKas);
        View::share('totalPengeluaran', $totalPengeluaran);
        View::share('totalPemasukan', $totalPemasukan);
    }
}
