<!DOCTYPE html>
<html lang="id">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pencatatan Kas Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}" type="image/png">
</head>
<body class="">
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container gap-5">
            <a class="navbar-brand" href="/dashboard">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav gap-5">
                    {{-- tes apakah navigasinya tetap bekerja jika berbeda bentuk --}}
                    <li class="nav-item"><a class="nav-link" href="/kas">Kas</a></li>
                    <li class="nav-item"><a class="nav-link" href="/transaksi">Transaksi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('siswa.index') }}">Siswa</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('kasbulanan.index') }}">Target</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pengeluaran">Pengeluaran</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin">Admin</a></li>
                    <li class="nav-item d-flex align-items-center text-white me-3">
                        <i class="fas fa-user-circle me-2"></i> 
                        {{ session('admin_name') ?? 'Guest' }}
                    </li>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="nav-item button btn btn-danger">
                            Logout
                        </button>
                    </form>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="bg-dark text-white text-center p-3">
        <div class="container">
            <strong>Total Pemasukan: Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</strong>
            &nbsp;|&nbsp;
            <strong>Total Kas Saat Ini: Rp {{ number_format($totalKas, 0, ',', '.') }}</strong>
            &nbsp;|&nbsp;
            <strong>Total Pengeluaran: Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</strong>
        </div>
    </div>
    
    <!-- Konten Utama -->
    <main role="main" class="container">
        
        
        <div class="container mt-4">
            @yield('content')
        </div>
    </main>
    
    

</body>
</html>
