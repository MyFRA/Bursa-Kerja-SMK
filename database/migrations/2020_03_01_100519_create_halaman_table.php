<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHalamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halaman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('link');
            $table->text('konten')->nullable();
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
        Schema::dropIfExists('halaman');
    }
}
