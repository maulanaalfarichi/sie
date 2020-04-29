<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawansby', function (Blueprint $table) {
            $table->id();
            $table->string('karyawan_sby');
            $table->string('gender_sby');
            $table->string('nohp_sby');
            $table->string('jobdesk_sby');
            $table->string('alamat_sby');
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
        Schema::dropIfExists('karyawansby');
    }
}
