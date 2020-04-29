<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapormenugsk extends Model
{
    protected $table = "lapormenugsk";
    protected $fillable = ['id', 'lapormenu_gsk', 'laporkategori_gsk', 'laportgl_gsk', 'laporterjual_gsk'];
    public $incrementing = false;
    protected $primaryKey = 'id';
}
