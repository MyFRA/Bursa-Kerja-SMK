<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Halaman extends Model
{
    protected $table = 'halaman';

    protected $fillable = ['judul', 'link', 'konten', 'status'];
}
