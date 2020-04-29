<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawangsksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawangsk', function (Blueprint $table) {
            $table->id();
            $table->string('karyawan_gsk');
            $table->string('gender_gsk');
            $table->string('nohp_gsk');
            $table->string('jobdesk_gsk');
            $table->string('alamat_gsk');
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
        Schema::dropIfExists('karyawangsk');
    }
}
