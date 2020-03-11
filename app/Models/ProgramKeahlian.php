<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    protected $table = 'm_program_keahlian';

    protected $fillable = [
    	'bidang_keahlian_id',
    	'kode',
        "nama",
        "deskripsi",
        "created_at",
        "updated_at"
    ];
}
