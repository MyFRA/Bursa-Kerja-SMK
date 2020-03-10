<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BidangIndustri extends Model
{
    protected $table = 'keterampilan';

    protected $fillable = ['nama', 'deskripsi'];
}
