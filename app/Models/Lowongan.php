<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $table = 'lowongan';

    protected $fillable = [
    	'perusahaan_id',
    	'nama_perusahaan',
    	'gambaran_perusahaan',
    	'jabatan',
    	'kompetensi_keahlian',
    	'keahlian',
    	'gaji_min',
    	'gaji_max',
    	'persyaratan',
    	'deskripsi',
    	'batas_akhir_lamaran',
    	'proses_lamaran',
    	'status',
    	'image',
    	'jumlah_pelamar',
    	'counter',
	];
	
	public function perusahaan() {
		return $this->belongsTo('App\Models\Perusahaan');
	}
}
