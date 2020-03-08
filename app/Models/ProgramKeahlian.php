<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    /**
     * Choose the table for this model.
     *
     * @var string
     */
    protected $table = "m_program_keahlian";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "bidang_keahlian_id",
        "kode",
        "nama",
        "deskripsi",
        "created_at",
        "updated_at"
    ];
}
