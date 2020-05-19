<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';

    protected $fillable = [
    	'user_id',
    	'bidang_keahlian_id',
    	'program_keahlian_id',
    	'nama',
    	'kategori',
    	'logo',
    	'image',
    	'telp',
    	'email',
    	'fax',
    	'site',
    	'facebook',
    	'twitter',
    	'instagram',
    	'linkedin',
    	'alamat',
    	'kabupaten',
    	'provinsi',
    	'negara',
    	'kodepos',
    	'jumlah_karyawan',
    	'waktu_proses_perekrutan',
    	'gaya_berpakaian',
    	'bahasa',
    	'waktu_bekerja',
    	'tunjangan',
    	'overview',
    	'alasan_harus_melamar',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
	}
	
	public function bidangKeahlian()
    {
        return $this->belongsTo('App\Models\BidangKeahlian');
	}
	
	public function programKeahlian()
    {
        return $this->belongsTo('App\Models\ProgramKeahlian');
    }

}
