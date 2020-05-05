<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
	protected $table = 'siswa';

    protected $fillable = [
    	'user_id',
    	'nama_pertama',
    	'nama_belakang',
    	'photo',
    	'tempat_lahir',
    	'tanggal_lahir',
    	'jenis_kelamin',
    	'email',
    	'hp',
    	'facebook',
    	'twitter',
    	'instagram',
    	'linkedin',
    	'alamat',
    	'kodepos',
    	'kabupaten',
    	'provinsi',
    	'negara',
    	'kartu_identitas',
    	'kartu_identitas_nomor',
    	'pengalaman_level',
    	'pengalaman_level_teks',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
	}
	
	public function siswaPendidikan()
	{
		return $this->hasOne('App\Models\SiswaPendidikan');
	}

}
