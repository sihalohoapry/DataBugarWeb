<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MateriVideo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'url_video','deskripsi', 'judul'
    ];

}
