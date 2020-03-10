<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidangKeahlian extends Model
{
    protected $table = 'm_bidang_keahlian';

    protected $fillable = [
    	'kode',
        "nama",
        "deskripsi",
        "created_at",
        "updated_at"
    ];
}
