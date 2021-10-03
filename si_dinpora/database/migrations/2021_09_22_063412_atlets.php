<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Atlets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atlets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lomba_id')->unsigned();
            $table->foreign('lomba_id')->references('id')->on('lombas');
            $table->string('nama');
            $table->bigInteger('sekolah_id')->unsigned();
            $table->foreign('sekolah_id')->references('id')->on('sekolahs');
            $table->bigInteger('cabor_id')->unsigned();
            $table->foreign('cabor_id')->references('id')->on('cabors');
            $table->bigInteger('kelas_cabor_id')->unsigned();
            $table->foreign('kelas_cabor_id')->references('id')->on('kelas_cabors');
            $table->bigInteger('tahun_id')->unsigned();
            $table->foreign('tahun_id')->references('id')->on('tahuns');
            $table->bigInteger('prestasi_id')->unsigned();
            $table->foreign('prestasi_id')->references('id')->on('prestasis');
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
        Schema::dropIfExists('atlets');
    }
}