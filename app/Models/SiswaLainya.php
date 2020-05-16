<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaLainya extends Model
{
    protected $table = 'siswa_lainnya';

    protected $fillable = [
        'siswa_id',
        'keterampilan_id',
        'gaji_diharapkan',
        'lokasi_diharap',
        'keterangan'
    ];

    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa');
    }

    public function keterampilan()
    {
        return $this->belongsTo('App\Models\Keterampilan');
    }
}
