<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtletsTable extends Migration
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
            $table->bigInteger('sekolah_id')->unsigned();
            $table->foreign('sekolah_id')->references('id')->on('sekolahs');
            $table->bigInteger('kelas_cabor_id')->unsigned();
            $table->foreign('kelas_cabor_id')->references('id')->on('kelas_cabors');
            $table->bigInteger('lomba_id')->unsigned();
            $table->foreign('lomba_id')->references('id')->on('lombas');
            $table->bigInteger('tahun_id')->unsigned();
            $table->foreign('tahun_id')->references('id')->on('tahuns');
            $table->string('nama');
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