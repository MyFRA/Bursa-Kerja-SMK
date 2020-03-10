<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataUang extends Model
{
    protected $table = 'm_mata_uang';

    protected $fillable = ['kode', 'negara'];
}
