<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('bidang_keahlian_id')->unsigned();
            $table->bigInteger('program_keahlian_id')->unsigned();
            $table->string('nama', 128);
            $table->enum('kategori', ['Negeri', 'Swasta', 'BUMN']);
            $table->string('logo', 128)->nullable();
            $table->string('image', 128)->nullable();
            $table->string('telp', 16)->nullable();
            $table->string('email', 128)->nullable();
            $table->string('fax', 32)->nullable();
            $table->string('site', 32)->nullable();
            $table->string('facebook', 64)->nullable();
            $table->string('twitter', 64)->nullable();
            $table->string('instagram', 64)->nullable();
            $table->string('linkedin', 64)->nullable();
            $table->string('alamat', 128)->nullable();
            $table->string('kabupaten', 32)->nullable();
            $table->string('provinsi', 32)->nullable();
            $table->string('negara', 32)->nullable();
            $table->string('kodepos', 8)->nullable();
            $table->string('jumlah_karyawan', 16)->nullable();
            $table->string('waktu_proses_perekrutan', 32)->nullable();
            $table->string('gaya_berpakaian', 128)->nullable();
            $table->string('bahasa', 128)->nullable();
            $table->string('waktu_bekerja', 64)->nullable();
            $table->text('tunjangan')->nullable();
            $table->text('overview')->nullable();
            $table->text('alasan_harus_melamar')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('bidang_keahlian_id')->references('id')->on('m_bidang_keahlian');
            $table->foreign('program_keahlian_id')->references('id')->on('m_program_keahlian');
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
        Schema::dropIfExists('perusahaan');
    }
}
