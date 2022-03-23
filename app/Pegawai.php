<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'mpegawai';

    protected $fillable = [
        "nik",
        "nip",
        "nama",
        "nokartu",
        "tempatlahir",
        "tanggallahir",
        "jeniskelamin",
        "alamat",
        "nohp",
    ];
}
