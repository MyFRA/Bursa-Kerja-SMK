<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaKeterampilan extends Model
{
    protected $table = 'siswa_keterampilan';

    protected $fillable = [
        'siswa_id',
        'keterangan',
        'tingkat'
    ];
}
