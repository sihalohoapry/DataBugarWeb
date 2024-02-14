<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermasalahanMedisTerakhir extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'nama_permasalahan_medis'
    ];
}
