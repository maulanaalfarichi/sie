<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLapormenugsksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapormenugsk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lapormenu_gsk');
            $table->string('laporkategori_gsk');
            $table->date('laportgl_gsk');
            $table->integer('laporterjual_gsk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lapormenugsk');
    }
}
