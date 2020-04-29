<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawangsk extends Model
{
    protected $table = "karyawangsk";
    protected $fillable = ['karyawan_gsk','gender_gsk','nohp_gsk','jobdesk_gsk','alamat_gsk'];
}
