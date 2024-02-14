<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyakitKeluarga extends Model
{
    use HasFactory;
    protected $fillable = ['sejarah_keluarga_id', 'nama_penyakit'];
}
