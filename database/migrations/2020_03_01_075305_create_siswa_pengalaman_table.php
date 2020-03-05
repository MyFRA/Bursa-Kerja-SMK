<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaPengalamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa_pengalaman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('siswa_id')->unsigned();
            $table->string('jabatan', 128);
            $table->string('perusahaan', 64);
            $table->year('mulai_kerja_tahun');
            $table->string('mulai_kerja_bulan', 16);
            $table->boolean('sekarang');
            $table->year('akhir_kerja_tahun');
            $table->string('akhir_kerja_bulan', 16);
            $table->bigInteger('keahlian')->unsigned();
            $table->bigInteger('bidang_pekerjaan')->unsigned();
            $table->bigInteger('bidang_industri')->unsigned();
            $table->string('negara', 32)->nullable();
            $table->string('provinsi', 32)->nullable();
            $table->string('mata_uang', 4)->nullable();
            $table->double('gaji_bulanan', 16, 0)->unsigned()->nullable();
            $table->text('keterangan')->nullable();
            $table->foreign('siswa_id')->references('id')->on('siswa');
            $table->foreign('keahlian')->references('id')->on('m_keahlian');
            $table->foreign('bidang_pekerjaan')->references('id')->on('m_bidang_pekerjaan');
            $table->foreign('bidang_industri')->references('id')->on('m_industri');
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
        Schema::dropIfExists('siswa_pengalaman');
    }
}
