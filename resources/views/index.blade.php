<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Halaman resmi kelas XI PPLG 1 SMK Negeri 1, Program Keahlian Pengembangan Perangkat Lunak dan Gim.">

    <title>XI PPLG 1 - SMK CITRA NEGARA </title>
    <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}" type="image/png">
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.core.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.theme.min.css"
      rel="stylesheet"
    />
    <link
      href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#000000"
        data-border-radius="small"></script>
    <script>tailwind.config = { darkMode: 'class' }</script>
  </head>
<body class="font-[Poppins] bg-gray-50 dark:bg-gray-900 transition-colors duration-200">
  {{-- <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" /> --}}
    <nav
      class="bg-white dark:bg-gray-800 shadow-sm fixed w-full z-50 transition-colors duration-200"
    >
      <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex">
            <div class="flex-shrink-0 flex items-center">
              <img
                class="h-8 w-auto"
                src="{{asset('img/logo.jpg')}}" alt="logo"
                alt="PPLG 1"
              />
              <span class="ml-2 font-semibold text-gray-900 dark:text-white"
                >XI PPLG 1</span
              >
            </div>
          </div>
          <div class="flex items-center">
  
            <div class="hidden md:flex space-x-8">
              <a
                href="#beranda"
                class="text-custom hover:text-custom-600 px-3 py-2 rounded-md text-sm font-medium"
                >Beranda</a
              >
              <a
                href="#profil"
                class="text-gray-700 hover:text-custom-600 px-3 py-2 rounded-md text-sm font-medium"
                >Profil Kelas</a
              >
              <a
                href="#jadwal"
                class="text-gray-700 hover:text-custom-600 px-3 py-2 rounded-md text-sm font-medium"
                >Jadwal</a
              >

              {{-- <a
                href="/kas"
                class="text-gray-700 hover:text-custom-600 px-3 py-2 rounded-md text-sm font-medium"
                >Keuangan Kas</a
              > --}}
            </div>
          </div>
        </div>
      </div>
    </nav>
    <main>
        <section id="beranda" class="pt-16">
            <div class="relative bg-white dark:bg-gray-800 overflow-hidden transition-colors duration-200">
              <div class="max-w-8xl mx-auto">
                <div class="relative z-10 pb-8 bg-white dark:bg-gray-800 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-1/2 lg:pb-28 xl:pb-32 transition-colors duration-200">
                  <div class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                      <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white sm:text-5xl md:text-6xl">
                        <span class="block">Selamat Datang di</span>
                        <span class="block text-custom">XI PPLG 1</span>
                      </h1>
                  <p
                    class="mt-3 text-base text-gray-500 dark:text-gray-400 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0"
                  >
                    Program Keahlian Pengembangan Perangkat Lunak dan Gim (PPLG)
                    - SMK CITRA NEGARA
                  </p>
                  <div
                    class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start"
                  >
                    <div class="rounded-md shadow">
                      <a
                        href="#profil"
                        class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-button text-black bg-custom hover:bg-custom-600 md:py-4 md:text-lg md:px-10"
                      >
                        Lihat Profil
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img
              class="h-70 w-full object-cover sm:h-85 md:h-120 lg:w-full lg:h-full"
              src="{{asset('img/kelas.jpg')}}"
              alt="Kelas PPLG"
            />
          </div>
        </div>
      </section>
    </section>
    <section id="profil" class="py-16 bg-gray-50">
      <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h2 class="text-3xl font-bold text-gray-900">Profil Kelas</h2>
          <p class="mt-4 text-lg text-gray-500">
            Mengenal lebih dekat kelas XI PPLG 1
          </p>
        </div>
        <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
          <div class="bg-white shadow rounded-lg p-6">
            <div class="text-center">
              <i class="fas fa-chalkboard-teacher text-4xl text-custom"></i>
              <h3 class="mt-4 text-lg font-medium text-gray-900">Wali Kelas</h3>
              <p class="mt-2 text-gray-500">Suci Indah Sari</p>
            </div>
          </div>
          <div class="bg-white shadow rounded-lg p-6">
            <div class="text-center">
              <i class="fas fa-user-tie text-4xl text-custom"></i>
              <h3 class="mt-4 text-lg font-medium text-gray-900">Ketua Kelas</h3>
              <p class="mt-2 text-gray-500">Raykonan Raivan Herlino</p>
            </div>
          </div>
          <div class="bg-white shadow rounded-lg p-6">
            <div class="text-center">
              <i class="fas fa-user text-4xl text-custom"></i>
              <h3 class="mt-4 text-lg font-medium text-gray-900">Wakil Ketua Kelas</h3>
              <p class="mt-2 text-gray-500">Bagoes Hutomo</p>
            </div>
          </div>
          <div class="bg-white shadow rounded-lg p-6">
            <div class="text-center">
              <i class="fas fa-user text-4xl text-custom"></i>
              <h3 class="mt-4 text-lg font-medium text-gray-900">Seketaris Kelas</h3>
              <p class="mt-2 text-gray-500">Pramodya Verda Pratama & Muhammad Yasser Rizqyan Hidayat </p>
            </div>
          </div>
          <div class="bg-white shadow rounded-lg p-6">
            <div class="text-center">
              <i class="fas fa-user text-4xl text-custom"></i>
              <h3 class="mt-4 text-lg font-medium text-gray-900">Bendahara Kelas</h3>
              <p class="mt-2 text-gray-500">Alif Keyno & Muhammad Haikal</p>
            </div>
          </div>
          <div class="bg-white shadow rounded-lg p-6">
            <div class="text-center">
              <i class="fas fa-user text-4xl text-custom"></i>
              <h3 class="mt-4 text-lg font-medium text-gray-900">Seksi Kebersihan</h3>
              <p class="mt-2 text-gray-500">Ridwan Adji & Tristan Prayogo</p>
            </div>
          </div>
          <div class="bg-white shadow rounded-lg p-6">
            <div class="text-center">
              <i class="fas fa-user text-4xl text-custom"></i>
              <h3 class="mt-4 text-lg font-medium text-gray-900">Seksi Keamanan</h3>
              <p class="mt-2 text-gray-500">Muhammad Syahrul & Ahmad Nurzaki</p>
            </div>
          </div>
          <div class="bg-white shadow rounded-lg p-6">
            <div class="text-center">
              <i class="fas fa-user text-4xl text-custom"></i>
              <h3 class="mt-4 text-lg font-medium text-gray-900">Seksi Tugas</h3>
              <p class="mt-2 text-gray-500">Muhammad Zhavar Andio & Iqbal Fadilah</p>
            </div>
          </div>
          <div class="bg-white shadow rounded-lg p-6">
            <div class="text-center">
              <i class="fas fa-user text-4xl text-custom"></i>
              <h3 class="mt-4 text-lg font-medium text-gray-900">Petugas Dokumentasi</h3>
              <p class="mt-2 text-gray-500">Faiz Syawaludin & Rizki Ramadhan</p>
            </div>
        </div>
      </div>
    </section>
        </div>
      </div>
      <section id="galeri" class="py-16 bg-gray-50">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900">Galeri Kegiatan</h2>
            <p class="mt-4 text-lg text-gray-500">
              Dokumentasi kegiatan kelas XI PPLG 1
            </p>
          </div>
          <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div class="overflow-hidden rounded-lg">
              <h3 class="text-center text-xl font-medium text-gray-900">FUTSAL</h3>
              <img
                class="w-full h-64 object-cover"
                src="img/futsal.jpg"
                alt="FUTSAL"
              />
            </div>
            <div class="overflow-hidden rounded-lg">
              <h3 class="text-center text-xl font-medium text-gray-900">Kunjungan Industri(PT NETKROM)</h3>
              <img
                class="w-full h-64 object-cover"
                src="img/netklrom.jpg"
                alt="Lomba"
              />
            </div>
            <div class="overflow-hidden rounded-lg">
              <h3 class="text-center text-xl font-medium text-gray-900">Kunjungan Industri (ITB)</h3>
              <img
                class="w-full h-64 object-cover"
                src="img/itb.jpg"
                alt="Presentasi"
              />
            </div>
          </div>
        </div>
      </section>
      
      <section id="jadwal" class="py-16 bg-white">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900">Jadwal Pelajaran</h2>
            <p class="mt-4 text-lg text-gray-500">
              Jadwal pelajaran kelas XI PPLG 1
            </p>
          </div>
          <div class="mt-12 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    HARI
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    PERTAMA
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    KEDUA
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    KETIGA
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    KEEMPAT
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    KELIMA
                  </th>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    SENIN
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    PBO
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    BTQ
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    BAHASA JEPANG
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                   PWPB
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    BASIS DATA
                  </td>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                  
                  </td>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    SELASA
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    PKKWU
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    BAHASA INDONESIA
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    SEJARAH
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    PAI
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    PWPB
                  </td>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    
                  </td>
              </tbody>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    RABU
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    BAHASA INGGRIS
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    PKKWU
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    SEJARAH
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    BASIS DATA
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    PWPB
                  </td>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                  
                  </td>
              </tbody>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    KAMIS
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    PWPB
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    MATEMATIKA
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    PBO
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    OLAHRAGA
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    BAHASA SUNDA 
                  </td>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                  </td>
              </tbody>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    JUMAT
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    BAHASA INGGRIS
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    PKN
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    MATEMATIKA
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    PWPB
                  </td>
              </tbody>
            </table>
          </div>
        </div>
      </section>
      <section id="jadwal" class="py-16 bg-white">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900">Jadwal Piket</h2>
                <p class="mt-4 text-lg text-gray-500">Jadwal pelajaran kelas XI PPLG 1</p>
            </div>
            <div class="mt-12 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Senin</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Selasa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rabu</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kamis</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumat</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Hanifa</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Keyno</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Namira</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Faiz</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Tristan</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Andio</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Fauzan</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Yasser</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Konan</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Nargis</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Danis</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Faisal</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Ridwan</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Frinzka</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Aziz</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rasky</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Irfan</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Haikal</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Iqbal</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Avatar</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Fahri</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Alfa</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rizki</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Syahrul</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">ALIK</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Fazri</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Fadid</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rasya</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rifai</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Pramodya</td>
                        </tr>
                        <!-- Baris baru untuk Hayat -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Hayat</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    </main>
    <footer class="bg-gray-900">
      <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <h3 class="text-white text-lg font-semibold mb-4">Media Sosial</h3>
            <div class="flex space-x-4">
              <a href="#" class="text-gray-400 hover:text-white"
                ><i class="fab fa-instagram text-xl"></i>
                <span class="text-gray-400 ml-2">sepesat__</span></a
              >
            </div>
          </div>
          <div>
            <h3 class="text-white text-lg font-semibold mb-4">Tautan</h3>
            <ul class="space-y-2">
              <li>
                <a href="#" class="text-gray-400 hover:text-white">Beranda</a>
              </li>
              <li>
                <a href="#" class="text-gray-400 hover:text-white"
                  >Profil Kelas</a
                >
              </li>
              <li>
                <a href="#" class="text-gray-400 hover:text-white">Jadwal</a>
              </li>
              <li>
                <a href="#" class="text-gray-400 hover:text-white">Galeri</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="mt-8 pt-8 border-t border-gray-800">
          <p class="text-center text-gray-400">
            © 2024 XI PPLG 1. All rights reserved.
          </p>
        </div>
      </div>
    </footer>
    <script>
      const themeToggle = document.getElementById("theme-toggle");
      const darkIcon = document.getElementById("dark-icon");
      const lightIcon = document.getElementById("light-icon");
      themeToggle.addEventListener("click", () => {
          document.documentElement.classList.toggle("dark");
          darkIcon.classList.toggle("hidden");
          lightIcon.classList.toggle("hidden");
      });

      function exportTableToExcel(tableID, filename) {
          let table = document.getElementById(tableID);
          let rows = table.rows;
          let csv = [];
          for (let i = 0; i < rows.length; i++) {
              let row = rows[i];
              let cols = row.querySelectorAll("td, th");
              let csvRow = [];
              for (let j = 0; j < cols.length; j++) {
                  csvRow.push(cols[j].innerText);
              }
              csv.push(csvRow.join(","));
          }
          let csvFile = new Blob([csv.join("\n")], { type: "text/csv" });
          let downloadLink = document.createElement("a");
          downloadLink.download = filename + ".csv";
          downloadLink.href = URL.createObjectURL(csvFile);
          downloadLink.click();
      }
  </script>
      
  </body>
</html