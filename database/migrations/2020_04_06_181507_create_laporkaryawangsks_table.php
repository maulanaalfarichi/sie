<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporkaryawangsksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporkaryawangsk', function (Blueprint $table) {
            $table->id();
            $table->string('laporkaryawan_gsk');
            $table->date('laportgl_gsk');
            $table->integer('lapormasuk_gsk');
            $table->integer('laporabsen_gsk');
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
        Schema::dropIfExists('laporkaryawangsk');
    }
}
