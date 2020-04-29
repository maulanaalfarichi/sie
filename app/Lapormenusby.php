<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapormenusby extends Model
{
    protected $table = "lapormenusby";
    protected $fillable = ['id', 'lapormenu_sby', 'laporkategori_sby', 'laportgl_sby', 'laporterjual_sby'];
    public $incrementing = false;
    protected $primaryKey = 'id';

}
