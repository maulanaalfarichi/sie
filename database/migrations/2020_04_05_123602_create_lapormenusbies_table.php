<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLapormenusbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapormenusby', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lapormenu_sby');
            $table->string('laporkategori_sby');
            $table->date('laportgl_sby');
            $table->integer('laporterjual_sby');
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
        Schema::dropIfExists('lapormenusby');
    }
}
