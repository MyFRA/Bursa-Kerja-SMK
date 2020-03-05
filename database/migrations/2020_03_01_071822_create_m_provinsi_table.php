<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMProvinsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_provinsi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('negara_id')->unsigned();
            $table->string('nama_provinsi', 32);
            $table->foreign('negara_id')->references('id')->on('m_negara');
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
        Schema::dropIfExists('m_provinsi');
    }
}
