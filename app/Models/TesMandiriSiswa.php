<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TesMandiriSiswa extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [

        'siswa_id',
        'berat_badan',
        'tinggi_badan',
        'point_imt',
        'result_imt',

        'pushup',
        'situp',
        'backup',
        'squatjump',
        'pullup',

        'waktu_lari',
        'waktu_jalan',
        'jenis_kebugaran',
        'point_kebugaran',
        'result_kebugaran'


    ];
}
