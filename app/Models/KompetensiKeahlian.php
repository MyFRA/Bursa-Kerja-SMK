<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KompetensiKeahlian extends Model
{
    /**
     * Choose the table for this model.
     *
     * @var string
     */
    protected $table = "m_kompetensi_keahlian";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "program_keahlian_id",
        "kode",
        "nama",
        "deskripsi",
        "created_at",
        "updated_at"
    ];
}
