@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <a href="{{ route('kas.index') }}">
        <button type="button" class="btn-info">
            Kembali ke Kas
        </button>
    </a>
    <h2 class="text-xl font-semibold mb-4">Detail Transaksi - {{ $siswa->nama }}</h2>

    <div class="">
        <table class="table table-striped mb-4">
            <thead class="table-light">
                <tr>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Total Pembayaran</th>
                    <th>Target</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $periode => $transaksi_bulanan)
                    @php
                        // Ambil data bulan dan tahun dari salah satu transaksi (karena semua dalam grup yang sama)
                        $kasBulanan = $transaksi_bulanan->first()->kasBulanan;
                        $bulan = ucfirst($kasBulanan->bulan);
                        $tahun = $kasBulanan->tahun;

                        // Hitung total transaksi siswa di bulan ini
                        $total = $transaksi_bulanan->sum('jumlah');
                        $target = $kasBulanan->target;
                        $status = ($total >= $target) ? 'Lunas' : 'Belum Lunas';
                    @endphp
                    <tr class="">
                        <td>{{ $bulan }}</td>
                        <td>{{ $tahun }}</td>
                        <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($target, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ $status == 'Lunas' ? 'bg-success' : 'bg-danger' }}">
                                {{ $status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
