<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'm_kabupaten';

    protected $fillable = ['provinsi_id', 'nama_kabupaten'];
}
