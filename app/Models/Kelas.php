<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'kelas',
        'sekolah_id',
        'user_id',
        'tahun_ajaran_id',
    ];
}
