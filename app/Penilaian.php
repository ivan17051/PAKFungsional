<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'penilaian';

    public $timestamps = false;

    protected $casts = [
        'awal' => 'date:Y-m-d',
        'akhir' => 'date:Y-m-d',
   ];

    protected $fillable = [
        "old",
        "awal",
        "akhir",
        "idpegawai",
        "idjabatan",
        "idgolongan",
        "idpendidikan",
        "idunitkerja",
        "utama",
        "utama_new",
        "pendformal",
        "pendformal_new",
        "diklat",
        "diklat_new",
        "sttpl",
        "sttpl_new",
        "yankes",
        "yankes_new",
        "profesi",
        "profesi_new",
        "pengmas",
        "pengmas_new",
        "penyankes",
        "penyankes_new",
        "pak",
        "idc",
        "idm",
    ];

    protected $hidden = [
        'doc', 'dom'
    ];
}