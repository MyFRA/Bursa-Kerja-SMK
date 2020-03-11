<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'm_provinsi';

    protected $fillable = ['negara_id', 'nama_provinsi'];
}
