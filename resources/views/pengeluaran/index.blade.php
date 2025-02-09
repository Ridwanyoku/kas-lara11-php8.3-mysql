@extends('layouts.app')


@section('content')
<div class="container">
    <h2 class="mb-4">Pengeluaran Kas</h2>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Pengeluaran</button>

    <!-- Tabel Pengeluaran -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengeluaran as $p)
            <tr>
                <td>{{ $p->deskripsi }}</td>
                <td>Rp {{ number_format($p->jumlah, 0, ',', '.') }}</td>
                <td>{{ $p->tanggal_pengeluaran }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $p->id }}">Edit</button>
                    <form action="{{ route('pengeluaran.destroy', $p->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pengeluaran ini?')">Hapus</button>
                    </form>
                </td>
            </tr>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal{{ $p->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('pengeluaran.update', $p->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Pengeluaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control" value="{{ $p->deskripsi }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control" value="{{ $p->jumlah }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Tanggal</label>
                                    <input type="date" name="tanggal_pengeluaran" class="form-control" value="{{ $p->tanggal_pengeluaran }}" required>
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
            @endforeach
        </tbody>
    </table>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('pengeluaran.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pengeluaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal_pengeluaran" class="form-control" required>
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

</div>
@endsection
