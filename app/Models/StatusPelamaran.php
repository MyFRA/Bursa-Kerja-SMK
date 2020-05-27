<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPelamaran extends Model
{
    protected $table = 'status_pelamaran';

    protected $fillable = [
        'pelamaran_id',
        'status', 
        'pesan'
    ];

    public function pelamaran()
    {
        return $this->belongsTo('App\Models\Pelamaran');
    }
}
