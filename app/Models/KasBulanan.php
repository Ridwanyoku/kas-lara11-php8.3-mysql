<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KasBulanan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kas_bulanan';
    protected $fillable = ['bulan', 'tahun', 'target'];
    protected $dates = ['deleted_at'];
}
