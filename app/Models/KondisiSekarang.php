<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiSekarang extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'berat_lalu',
        'berat_sekarang',
        'tinggi_lalu',
        'tinggi_sekarang',
        'result_berat',
        'result_tinggi',
    ];
}
