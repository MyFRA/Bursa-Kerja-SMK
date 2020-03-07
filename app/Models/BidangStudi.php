<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidangStudi extends Model
{
    protected $table = 'm_bidang_studi';

    protected $fillable = [
        "nama",
        "deskripsi",
        "created_at",
        "updated_at"
    ];
}
