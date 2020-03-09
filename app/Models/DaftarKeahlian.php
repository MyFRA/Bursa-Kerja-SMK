<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarKeahlian extends Model
{
    protected $table = 'm_keahlian';

    protected $fillable = ['nama', 'deskripsi'];
}
