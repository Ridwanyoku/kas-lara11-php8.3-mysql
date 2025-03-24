@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Total Kas Siswa Tahun {{ $tahun }}</h2>

    <!-- Dropdown Pilihan Tahun -->
    <form method="GET" action="{{ route('kas.index') }}" class="mb-4">
        <label for="tahun" class="font-semibold">Pilih Tahun:</label>
        <select name="tahun" id="tahun" class="border p-2 rounded" onchange="this.form.submit()">
            @foreach($years as $y)
                <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
            @endforeach
        </select>
    </form>

    <!-- Tabel Total Kas Siswa -->
    <table class="table table-striped mb-4">
        <thead class="table-light">
            <tr class="bg-gray-200">
                <th class="border p-2">Nama Siswa</th>
                <th class="border p-2">Total Kas</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kasSiswa as $siswa)
            <tr>
                <td class="border p-2">{{ $siswa->nama }}</td>
                <td class="border p-2">Rp {{ number_format($siswa->total_kas, 0, ',', '.') }}</td>
                <td class="border p-2">
                    <a href="{{ route('transaksi.detail', $siswa->id) }}" class="btn btn-info btn-sm">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
