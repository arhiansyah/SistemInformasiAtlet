<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatihs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('instansi_id')->unsigned();
            $table->foreign('instansi_id')->references('id')->on('instansis');
            $table->bigInteger('lomba_id')->unsigned();
            $table->foreign('lomba_id')->references('id')->on('lombas');
            $table->bigInteger('jenjang_id')->unsigned();
            $table->foreign('jenjang_id')->references('id')->on('jenjangs');
            $table->string('nama');
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
        Schema::dropIfExists('pelatihs');
    }
}