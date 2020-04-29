<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporpengunjungsby extends Model
{
    protected $table = "laporpengunjungsby";
    protected $fillable = ['id','laportgl_sby','laporjumlah_sby'];
    public $incrementing = false;
    protected $primaryKey = 'id';
}
