<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'mpendidikan';

    public $timestamps = false;

    protected $fillable = [
        "nama",
    ];
}
