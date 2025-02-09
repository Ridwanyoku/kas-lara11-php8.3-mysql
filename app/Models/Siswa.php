<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'siswa';
    protected $fillable = ['nama', 'kelas'];

    public function transaksi()
    {
        return $this->hasMany(TransaksiSiswa::class, 'siswa_id');
    }
}
