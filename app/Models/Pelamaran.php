<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelamaran extends Model
{
    protected $table = 'pelamaran';

    protected $fillable = ['siswa_id', 'lowongan_id', 'proposal_pelamaran'];

    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa');
    }
}
