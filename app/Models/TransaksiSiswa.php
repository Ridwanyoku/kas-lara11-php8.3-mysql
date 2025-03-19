<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiSiswa extends Model
{
    use HasFactory;

    protected $table = 'transaksi_siswa';
    protected $fillable = ['siswa_id', 'kas_bulanan_id', 'jumlah', 'out'];

    public $timestamps = true;

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function kasBulanan()
    {
        return $this->belongsTo(KasBulanan::class);
    }

    public function getStatusLunasAttribute()
    {
    $kasBulanan = KasBulanan::where('id', $this->kas_bulanan_id)->first();

    if (!$kasBulanan) {
        return 'Tidak Diketahui';
    }

    return $this->jumlah >= $kasBulanan->target ? 'Lunas' : 'Belum Lunas';
    }
}
