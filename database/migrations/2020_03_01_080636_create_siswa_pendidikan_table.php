<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa_pendidikan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('siswa_id')->unsigned();
            $table->string('nama_sekolah', 64);
            $table->year('tahun_lulus');
            $table->string('bulan_lulus');
            $table->enum('tingkat_sekolah', ['SD', 'SMP/MTS', 'SMK/SMA/MA', 'S1', 'S2', 'S3']);
            $table->bigInteger('bidang_studi')->unsigned();
            $table->bigInteger('jurusan')->unsigned();
            $table->enum('nilai_akhir', ['IPK', 'NEM', 'Tidak Tamat', 'Masih Belajar']);
            $table->tinyInteger('nilai_skor')->unsigned();
            $table->text('keterangan')->nullable();
            $table->foreign('siswa_id')->references('id')->on('siswa');
            $table->foreign('bidang_studi')->references('id')->on('m_bidang_studi');
            $table->foreign('jurusan')->references('id')->on('m_jurusan');
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
        Schema::dropIfExists('siswa_pendidikan');
    }
}
