<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolaTidur extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'jam_tidur',
        'jam_bangun',
        'durasi_tidur',
    ];
}
