@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Kas Bulanan</h2>

    <!-- Pesan Sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Kas Bulanan</button>

    <!-- Tabel Kas Bulanan -->
    <table class="table table-striped">
        <thead class="table-light">
            <tr>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Target</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kas as $item)
                <tr>
                    <td>{{ $item->bulan }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>{{ number_format($item->target, 0, ',', '.') }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">Edit</button>
                        <form action="{{ route('kas.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('kas.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Kas Bulanan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="bulan" class="form-control mb-2" value="{{ $item->bulan }}" required>
                                    <input type="number" name="tahun" class="form-control mb-2" value="{{ $item->tahun }}" required>
                                    <input type="number" name="target" class="form-control" value="{{ $item->target }}" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('kas.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kas Bulanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="bulan" class="form-control mb-2" placeholder="Bulan" required>
                        <input type="number" name="tahun" class="form-control mb-2" placeholder="Tahun" required>
                        <input type="number" name="target" class="form-control" placeholder="Target" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
