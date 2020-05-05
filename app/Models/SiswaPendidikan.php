<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaPendidikan extends Model
{
    protected $table = 'siswa_pendidikan';

    protected $fillable = [
        'siswa_id',
        'bidang_keahlian_id',
        'program_keahlian_id',
        'kompetensi_keahlian_id',
        'nama_sekolah',
        'tahun_lulus',
        'bulan_lulus',
        'tingkat_sekolah',
        'nilai_akhir',
        'nilai_skor',
        'keterangan',
    ];

    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa');
    }
}
