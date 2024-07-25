<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'c1',
        'c2',
        'c3',
        'c4',
        'c5',
        'nilai_utilitas',
    ];
}
