<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    /**
     * Choose the table for this model.
     *
     * @var string
     */
    protected $table = "artikel";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "judul",
        "link",
        "konten",
        "deskripsi",
        "tags",
        "image",
        "status",
        "counter",
        "created_at",
        "updated_at"
    ];
}
