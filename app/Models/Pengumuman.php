<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    /**
     * Choose the table for this model.
     *
     * @var string
     */
    protected $table = "pengumuman";

    protected $fillable = [
        'judul', 'link', 'deskripsi', 'status'
    ];
}
