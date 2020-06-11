<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaKemampuanBahasaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa_kemampuan_bahasa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('siswa_id')->unsigned();
            $table->bigInteger('bahasa_id')->unsigned();
            $table->tinyInteger('lisan')->unsigned()->nullable();
            $table->tinyInteger('tulisan')->unsigned()->nullable();
            $table->boolean('utama')->default(false);
            $table->enum('sertifikat', ['TOEFL', 'IELTS', 'TOEIC'])->nullable();
            $table->tinyInteger('skor')->unsigned()->nullable();
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->foreign('bahasa_id')->references('id')->on('m_bahasa');
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
        Schema::dropIfExists('siswa_kemampuan_bahasa');
    }
}
