<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResutKebugaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'end_value',
        'start_value',
        'result',
        'jenis_klamin'
    ];
}
