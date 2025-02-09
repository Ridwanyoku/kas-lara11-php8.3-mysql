<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        Siswa::create(['nama' => 'Budi Santoso', 'kelas' => 'XII IPA 1']);
        Siswa::create(['nama' => 'Ani Suryani', 'kelas' => 'XII IPA 1']);
    }
}

