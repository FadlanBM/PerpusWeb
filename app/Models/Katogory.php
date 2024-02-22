<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katogory extends Model
{
    use HasFactory;

    protected $table = 'kategori_bukus';

    protected $fillable = [
        'nama_kategori',
    ];
}
