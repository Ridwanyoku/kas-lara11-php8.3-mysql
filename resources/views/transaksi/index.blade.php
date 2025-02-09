@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Transaksi Siswa</h2>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Transaksi</button>

    {{-- <!-- Filter Pencarian dan Status -->
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari nama siswa...">
        </div>
        <div class="col-md-4">
            <select id="statusFilter" class="form-select">
                <option value="">Semua Status</option>
                <option value="lunas">Lunas</option>
                <option value="belum lunas">Belum Lunas</option>
            </select>
        </div>
    </div> --}}

    <!-- Tabel Transaksi -->
    <table class="table table-striped mb-4">
        <thead class="">
            <tr>
                <th>Nama Siswa</th>
                <th>Bulan</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $totalKas = 0; @endphp
            @foreach($transaksi as $t)
            @php $totalKas += $t->jumlah; @endphp
            <tr>
                <td>{{ $t->siswa->nama }}</td>
                <td>{{ $t->kasBulanan->bulan }}</td>
                <td>Rp {{ number_format($t->jumlah, 0, ',', '.') }}</td>
                <td>
                    <span class="badge {{ $t->status_lunas == 'Lunas' ? 'bg-success' : 'bg-danger' }}">
                        {{ $t->status_lunas }}
                    </span>
                </td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $t->id }}">Edit</button>
                    <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus transaksi ini?')">Hapus</button>
                    </form>
                </td>
            </tr>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal{{ $t->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('transaksi.update', $t->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Transaksi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control" value="{{ $t->jumlah }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Tanggal Bayar</label>
                                    <input type="date" name="tanggal_bayar" class="form-control" value="{{ $t->tanggal_bayar }}" required>
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
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Pilih Siswa</label>
                        <select name="siswa_id" class="form-control" required>
                            @foreach($siswa as $s)
                                <option value="{{ $s->id }}">{{ $s->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Pilih Bulan</label>
                        <select name="kas_bulanan_id" class="form-control" required>
                            @foreach($kasBulanan as $k)
                                <option value="{{ $k->id }}">{{ $k->bulan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Bayar</label>
                        <input type="date" name="tanggal_bayar" class="form-control" required>
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

<!-- jQuery (pastikan disertakan) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    function filterTable() {
        var searchText = $('#searchInput').val().toLowerCase();
        var statusFilter = $('#statusFilter').val().toLowerCase();

        $('#siswaTable tbody tr').each(function(){
            // Asumsikan kolom pertama berisi nama siswa
            var nama = $(this).find('td').eq(0).text().toLowerCase();
            // Untuk kolom status, coba ambil teks dari <span> terlebih dahulu
            var status = $(this).find('td').eq(3).find('span').text().toLowerCase();
            if(!status){
                // fallback jika tidak ada <span>
                status = $(this).find('td').eq(3).text().toLowerCase();
            }
            
            var showRow = true;
            // Filter berdasarkan nama siswa
            if(searchText && nama.indexOf(searchText) === -1){
                showRow = false;
            }
            // Filter berdasarkan status
            if(statusFilter && status.indexOf(statusFilter) === -1){
                showRow = false;
            }
            $(this).toggle(showRow);
        });
    }

    // Event handler: filter langsung saat mengetik (keyup atau input) dan saat dropdown berubah
    $('#searchInput').on('keyup input', filterTable);
    $('#statusFilter').on('change', filterTable);
});
</script>

@endsection
