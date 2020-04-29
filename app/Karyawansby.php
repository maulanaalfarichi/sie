<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawansby extends Model
{
    protected $table = "karyawansby";
    protected $fillable = ['karyawan_sby','gender_sby','nohp_sby','jobdesk_sby','alamat_sby'];
}
