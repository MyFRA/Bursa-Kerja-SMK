<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('link');
            $table->string('pelaksanaan', 128)->nullable();
            $table->string('lokasi', 128)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('image', 128)->nullable();
            $table->enum('status', ['Draf', 'Aktif', 'Nonaktif'])->default('Draf');
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
        Schema::dropIfExists('agenda');
    }
}
