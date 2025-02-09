<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('transaksi_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade');
            $table->foreignId('kas_bulanan_id')->constrained('kas_bulanan')->onDelete('cascade'); // Tambahkan ini
            $table->integer('jumlah');
            $table->timestamps();
        });
        
    }

    public function down(): void {
        Schema::dropIfExists('transaksi_siswa');
    }
};
