<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('kas_bulanan', function (Blueprint $table) {
            $table->id();
            $table->string('bulan');
            $table->integer('tahun');
            $table->integer('target');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kas_bulanan');
    }
};
