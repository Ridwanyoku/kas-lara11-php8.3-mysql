@extends('layouts.app')

@section('content')
<h3>Tambah Transaksi</h3>

<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Siswa</label>
        <select name="siswa_id" class="form-select">
            @foreach ($siswa as $s)
                <option value="{{ $s->id }}">{{ $s->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Bulan</label>
        <input type="number" name="bulan" class="form-control" min="1" max="12">
    </div>
    <div class="mb-3">
        <label class="form-label">Tahun</label>
        <input type="number" name="tahun" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Jumlah</label>
        <input type="number" name="jumlah" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Bayar</label>
        <input type="date" name="tanggal_pembayaran" class="form-control">
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection
