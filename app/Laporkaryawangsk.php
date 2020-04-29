<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporkaryawangsk extends Model
{
    protected $table = "laporkaryawangsk";
    //protected $fillable = ['id','laporkaryawan_gsk','laportgl_gsk','lapormasuk_gsk','laporabsen_gsk'];
    protected $guarded = [];
    public $incrementing = false;
    protected $primaryKey = 'id';
}
