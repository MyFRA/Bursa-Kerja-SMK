<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BidangIndustri extends Model
{
    protected $table = 'm_industri';

    protected $fillable = ['nama', 'deskripsi'];
}
