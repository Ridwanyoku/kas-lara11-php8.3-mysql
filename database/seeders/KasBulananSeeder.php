<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KasBulanan;

class KasBulananSeeder extends Seeder
{
    public function run()
    {
        KasBulanan::create(['bulan' => 'Januari', 'tahun' => 2025, 'target' => 20000]);
        KasBulanan::create(['bulan' => 'Februari', 'tahun' => 2025, 'target' => 40000]);
    }
}

