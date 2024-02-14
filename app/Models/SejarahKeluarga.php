<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SejarahKeluarga extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'masalah_kesehatan_kk',
        'meninggal_under_50',
        'deskripsi_penyebab_meninggal',
    ];
}
