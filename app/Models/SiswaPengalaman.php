<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaPengalaman extends Model
{
    protected $table = 'siswa_pengalaman';

    protected $fillable =
    [
        'siswa_id',
        'bidang_keahlian_id',
        'program_keahlian_id',
        'kompetensi_keahlian_id',
        'jabatan',
        'perusahaan', 
        'mulai_kerja_tahun',
        'mulai_kerja_bulan',
        'sekarang',
        'akhir_kerja_tahun',
        'akhir_kerja_bulan',
        'negara',
        'provinsi',
        'mata_uang',
        'gaji_bulanan',
        'keterangan'
    ];

    public function bidangKeahlian()
    {
        return $this->belongsTo('App\Models\BidangKeahlian');
    }

    public function programKeahlian()
    {
        return $this->belongsTo('App\Models\ProgramKeahlian');
    }

    public function kompetensiKeahlian()
    {
        return $this->belongsTo('App\Models\KompetensiKeahlian');
    }
}
