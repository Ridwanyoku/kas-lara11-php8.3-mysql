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
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav gap-5">
                    <li class="nav-item"><a class="nav-link" href="/transaksi">Transaksi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('siswa.index') }}">Siswa</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('kas.index') }}">Target</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pengeluaran">Pengeluaran</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin">Admin</a></li>
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
    
    
    {{-- <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-4 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-wallet text-2xl text-custom"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Kas Terkumpul</h3>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">Rp 2.500.000</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-money-bill-wave text-2xl text-orange-500"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500">Total Pengeluaran</h3>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">Rp 500.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    
    <!-- Konten Utama -->
    <main role="main" class="container">
        
        
        <div class="container mt-4">
            @yield('content')
        </div>
    </main>
    
    <!-- Bootstrap JS -->
    {{-- <footer class="bottom bg-dark text-white text-center p-3">
        <strong>Total Kas: Rp <span id="totalKas">0</span></strong>
    </footer>
     --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch("{{ route('kas.total') }}")
                .then(response => response.json())
                .then(data => {
                    document.getElementById("totalKas").innerText = new Intl.NumberFormat('id-ID').format(data.total);
                })
                .catch(error => console.error('Error:', error));
        });
    </script> --}}
    

</body>
</html>
