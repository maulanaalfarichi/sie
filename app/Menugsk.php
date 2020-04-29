<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menugsk extends Model
{
    protected $table = "menugsk";
    protected $fillable = ['id','menu_gsk','kategori_gsk','harga_gsk'];
}
