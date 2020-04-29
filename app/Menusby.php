<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menusby extends Model
{
    protected $table = "menusby";
    protected $fillable = ['id','menu_sby','kategori_sby','harga_sby'];
    public $incrementing = false;
    protected $primaryKey = 'id';

}
