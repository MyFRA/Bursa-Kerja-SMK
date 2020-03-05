<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    /**
     * Choose the table for this model.
     *
     * @var string
     */
    protected $table = "m_jurusan";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "kode",
        "nama",
        "deskripsi",
        "created_at",
        "updated_at"
    ];
}
