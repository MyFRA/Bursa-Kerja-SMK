<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMKabupatenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_kabupaten', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('provinsi_id')->unsigned();
            $table->string('nama_kabupaten', 32);
            $table->foreign('provinsi_id')->references('id')->on('m_provinsi');
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
        Schema::dropIfExists('m_kabupaten');
    }
}
