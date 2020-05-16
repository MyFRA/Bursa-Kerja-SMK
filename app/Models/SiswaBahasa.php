<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaBahasa extends Model
{
    protected $table = 'siswa_kemampuan_bahasa';

    protected $fillable = [
        'siswa_id',
        'bahasa_id',
        'lisan',
        'tulisan',
        'utama',
        'sertifikat',
        'skor'
    ];

    public function bahasa()
    {
        return $this->belongsTo('App\Models\Bahasa');
    }
}
