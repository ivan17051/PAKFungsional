<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'mjabatan';

    public $timestamps = false;

    protected $fillable = [
        "nama",
        "detail",
    ];
}
