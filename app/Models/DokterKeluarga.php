<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokterKeluarga extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'nama_dokter',
        'alamat_praktek',
        'no_telpon',
        'terakhir_checkup',
    ];
}
