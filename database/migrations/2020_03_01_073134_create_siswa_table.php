<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('nama_pertama', 64);
            $table->string('nama_belakang', 64)->nullable();
            $table->string('photo', 128)->nullable();
            $table->string('tempat_lahir', 32)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('email', 128)->nullable();
            $table->string('hp', 16)->nullable();
            $table->string('facebook', 64)->nullable();
            $table->string('twitter', 64)->nullable();
            $table->string('instagram', 64)->nullable();
            $table->string('linkedin', 64)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('kodepos', 8)->nullable();
            $table->string('kabupaten', 32)->nullable();
            $table->string('provinsi', 32)->nullable();
            $table->string('negara', 32)->nullable();
            $table->enum('kartu_identitas', ['KTP', 'SIM', 'NPWP', 'KARTU PELAJAR'])->nullable();
            $table->string('kartu_identitas_nomor', 16)->nullable();
            $table->string('pengalaman_level', 128)->nullable();
            $table->string('pengalaman_level_teks', 128)->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('siswa');
    }
}
