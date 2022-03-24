<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'mgolongan';

    public $timestamps = false;

    protected $fillable = [
        "golongan",
        "nama",
    ];
}
