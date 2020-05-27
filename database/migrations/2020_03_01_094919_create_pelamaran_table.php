<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelamaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelamaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('siswa_id')->unsigned();
            $table->bigInteger('lowongan_id')->unsigned();
            $table->text('proposal_pelamaran');
            $table->foreign('siswa_id')->references('id')->on('siswa');
            $table->foreign('lowongan_id')->references('id')->on('lowongan')->onDelete('cascade');
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
        Schema::dropIfExists('pelamaran');
    }
}
