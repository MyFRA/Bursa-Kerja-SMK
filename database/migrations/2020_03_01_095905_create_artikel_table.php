<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('link');
            $table->text('konten')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('tags')->nullable();
            $table->string('image', 128)->nullable();
            $table->enum('status', ['Draf', 'Aktif', 'Nonaktif'])->default('Draf');
            $table->smallInteger('counter')->unsigned()->default(0);
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
        Schema::dropIfExists('artikel');
    }
}
