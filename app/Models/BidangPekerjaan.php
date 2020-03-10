<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidangPekerjaan extends Model
{
    protected $table = "m_bidang_pekerjaan";

    protected $fillable = ['nama', 'deskripsi'];
}
