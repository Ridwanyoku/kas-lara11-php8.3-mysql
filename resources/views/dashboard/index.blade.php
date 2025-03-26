@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Dashboard</h2>
    
    <div class="row">
        <!-- Saldo Kas -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Saldo Kas</h5>
                    <h3 class="text-success">Rp {{ number_format($saldoKas, 0, ',', '.') }}</h3>
                    <small class="text-muted">Total pemasukan - pengeluaran</small>
                </div>
            </div>
        </div>

        <!-- Total Pemasukan & Pengeluaran -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Pemasukan</h5>
                    <h3 class="text-primary">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</h3>
                    <small class="text-muted">Total kas masuk</small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Pengeluaran</h5>
                    <h3 class="text-danger">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</h3>
                    <small class="text-muted">Total kas keluar</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Transaksi Terbaru -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Transaksi Terbaru</h5>
                    <ul class="list-group">
                        @foreach ($transaksiTerbaru as $transaksi)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $transaksi->siswa ? $transaksi->siswa->nama : 'Tidak diketahui' }}
                                <span class="badge bg-success">Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- Target Bulanan -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Target Bulanan</h5>
                    <ul class="list-group">
                        @foreach ($targetBulanan as $target)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $target->bulan }} {{ $target->tahun }}
                                <span class="badge bg-primary">Rp {{ number_format($target->target, 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    
    
        <!-- Pengeluaran Terbaru -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Pengeluaran Terbaru</h5>
                    <ul class="list-group">
                        @foreach ($pengeluaranTerbaru as $pengeluaran)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $pengeluaran->deskripsi }}
                                <span class="badge bg-danger">Rp {{ number_format($pengeluaran->jumlah, 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    


</div>
@endsection
