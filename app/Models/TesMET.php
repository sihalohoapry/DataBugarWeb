<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TesMET extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'siswa_id',
        'tes_id',
        'is_fisik_berat',
        'is_fisik_sedang',
        'is_fisik_ringan',
        'repetisi_berat',
        'repetisi_sedang',
        'lama_berat',
        'lama_sedang',
        'lama_jalan',
        'hasil_berat',
        'hasil_sedang',
        'hasil_ringan',
        'hasil_met',
        'result_met'
    ];
}
