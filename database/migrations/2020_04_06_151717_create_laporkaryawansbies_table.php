<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporkaryawansbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporkaryawansby', function (Blueprint $table) {
            $table->id();
            $table->string('laporkaryawan_sby');
            $table->date('laportgl_sby');
            $table->integer('lapormasuk_sby');
            $table->integer('laporabsen_sby');
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
        Schema::dropIfExists('laporkaryawansby');
    }
}
