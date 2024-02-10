<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalTest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'created_by',
        'nomer_tes',
        'class_id',
        'sekolah_id',
        'start_tes',
        'end_tes',
    ];
}
