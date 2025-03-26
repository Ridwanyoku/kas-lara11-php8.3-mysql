@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

@if(session('error'))
    <div class="alert alert-danger" role="alert">
    {{ session('error') }}
    </div>
@endif

<div class="container">
    <h2 class="mb-4">Transaksi Siswa</h2>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Transaksi</button>

    <!-- Form Filter Bulan dan Tahun -->
    <!-- Form Filter Bulan dan Tahun -->
<form method="GET" action="{{ route('transaksi.index') }}" class="row g-3 mb-4" id="filterForm">
    <div class="col-md-4">
        <select name="bulan" class="form-select" onchange="document.getElementById('filterForm').submit();">
            <option value="">Semua Bulan</option>
            @php
                $months = [
                    'januari' => 'Januari',
                    'februari' => 'Februari',
                    'maret' => 'Maret',
                    'april' => 'April',
                    'mei' => 'Mei',
                    'juni' => 'Juni',
                    'juli' => 'Juli',
                    'agustus' => 'Agustus',
                    'september' => 'September',
                    'oktober' => 'Oktober',
                    'november' => 'November',
                    'desember' => 'Desember',
                ];
            @endphp
            @foreach($months as $key => $value)
                <option value="{{ $key }}" {{ request('bulan') == $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <select name="tahun" class="form-select" onchange="document.getElementById('filterForm').submit();">
            <option value="">Semua Tahun</option>
            @foreach($years as $year)
                <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
            @endforeach
        </select>
    </div>
</form>


    <!-- Tabel Transaksi -->
    <table class="table table-striped mb-4">
        <thead class="table-light">
            <tr>
                <th>Nama Siswa</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Jumlah</th>
                {{-- <th>Status</th> --}}
                <th>Waktu pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $t)
            <tr>
                <td>{{ $t->siswa->nama }}</td>
                <td>{{ $t->kasBulanan->bulan }}</td>
                <td>{{ $t->kasBulanan->tahun }}</td>
                <td>Rp {{ number_format($t->jumlah, 0, ',', '.') }}</td>
                {{-- <td>
                    <span class="badge {{ $t->status_lunas == 'Lunas' ? 'bg-success' : 'bg-danger' }}">
                        {{ $t->status_lunas }}
                    </span>
                </td> --}}
                <td>{{ $t->updated_at->format('d-m-Y H:i') }}</td>
                <td>
                    <a href="{{ route('transaksi.detail', $t->siswa->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $t->id }}">Edit</button>
                    {{-- <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus transaksi ini?')">Hapus</button>
                    </form> --}}
                </td>
            </tr>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal{{ $t->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('transaksi.update', $t->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Hidden Input untuk menjaga nilai siswa_id dan kas_bulanan_id -->
                            <input type="hidden" name="siswa_id" value="{{ $t->siswa_id }}">
                            <input type="hidden" name="kas_bulanan_id" value="{{ $t->kas_bulanan_id }}">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Transaksi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control" value="{{ $t->jumlah }}" required>
                                </div>  
                                {{-- <div class="mb-3">
                                    <label>Tanggal Bayar</label>
                                    <input type="date" name="tanggal_bayar" class="form-control" value="{{ $t->tanggal_bayar }}" required>
                                </div> --}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Pilih Siswa -->
                    <div class="mb-3">
                        <label class="form-label">Pilih Siswa</label>
                        <select name="siswa_id" class="form-control" required>
                            @foreach($siswa as $s)
                                <option value="{{ $s->id }}">{{ $s->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Pilih Bulan -->
                    <div class="mb-3">
                        <label class="form-label">Bulan:</label>
                        <select name="bulan" class="form-control" required>
                            <option value="">Pilih Bulan</option>
                            @foreach($months as $key => $name)
                                <option value="{{ $key }}">{{ ucfirst($name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Pilih Tahun -->
                    <div class="mb-3">
                        <label class="form-label">Tahun:</label>
                        <select name="tahun" class="form-control" required>
                            <option value="">Pilih Tahun</option>
                            @foreach($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Jumlah Pembayaran -->
                    <div class="mb-3">
                        <label class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
