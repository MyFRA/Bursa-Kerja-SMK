<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStatusLamaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_pelamaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pelamaran_id')->unsigned();
            $table->enum('status', ['diterima', 'ditolak', 'dipanggil']);
            $table->text('pesan');
            $table->timestamps();

            $table->foreign('pelamaran_id')->references('id')->on('pelamaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_pelamaran');
    }
}
