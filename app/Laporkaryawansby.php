<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporkaryawansby extends Model
{
    protected $table = "laporkaryawansby";
    //protected $fillable = ['id','laporkaryawan_sby','laportgl_sby','lapormasuk_sby','laporabsen_sby'];
    protected $guarded = [];
    public $incrementing = false;
    protected $primaryKey = 'id';
}
