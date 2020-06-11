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
            $table->bigInteger('bidang_keahlian_id')->unsigned();
            $table->bigInteger('program_keahlian_id')->unsigned();
            $table->bigInteger('kompetensi_keahlian_id')->unsigned();
            $table->string('nama_sekolah', 64);
            $table->year('tahun_lulus');
            $table->string('bulan_lulus');
            $table->enum('tingkat_sekolah', ['SD', 'SMP/MTS', 'SMK/SMA/MA', 'S1', 'S2', 'S3']);
            $table->enum('nilai_akhir', ['IPK', 'NEM', 'Tidak Tamat', 'Masih Belajar']);
            $table->tinyInteger('nilai_skor')->unsigned();
            $table->text('keterangan')->nullable();
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->foreign('bidang_keahlian_id')->references('id')->on('m_bidang_keahlian');
            $table->foreign('program_keahlian_id')->references('id')->on('m_program_keahlian');
            $table->foreign('kompetensi_keahlian_id')->references('id')->on('m_kompetensi_keahlian');
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
