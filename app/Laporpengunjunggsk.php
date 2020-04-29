<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporpengunjunggsk extends Model
{
    protected $table = "laporpengunjunggsk";
    //protected $fillable = ['id','laportgl_gsk','laporjumlah_gsk'];
    protected $guarded = [];
    public $incrementing = false;
    protected $primaryKey = 'id';
}
