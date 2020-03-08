<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMProgramKeahlianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_program_keahlian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bidang_keahlian_id')->unsigned();
            $table->string('kode', 8)->unique();
            $table->string('nama', 128);
            $table->text('deskripsi')->nullable();
            $table->foreign('bidang_keahlian_id')->references('id')->on('m_bidang_keahlian');
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
        Schema::dropIfExists('m_program_keahlian');
    }
}
