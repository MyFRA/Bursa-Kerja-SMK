<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Keterampilan extends Model
{
    protected $table = 'm_keterampilan';

    protected $fillable = ['nama', 'deskripsi'];
}
