@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2 class="mb-4">Detail Transaksi: {{ $siswa->nama }}</h2>

    <table class="table table-striped">
        <thead class="table-light">
            <tr>
                <th>Periode</th>
                <th>Tanggal Bayar</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $t)
            <tr>
                <td>{{ ucfirst($t->kasBulanan->bulan) }} - {{ $t->kasBulanan->tahun }}</td>
                <td>{{ $t->updated_at->format('d-m-Y H:i') }}</td>
                <td>Rp {{ number_format($t->jumlah, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
