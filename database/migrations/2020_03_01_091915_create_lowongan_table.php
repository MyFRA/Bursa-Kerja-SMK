<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowonganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowongan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('perusahaan_id')->nullable();
            $table->string('nama_perusahaan', 128)->nullable();
            $table->text('gambaran_perusahaan')->nullable();
            $table->string('jabatan', 128);
            $table->json('kompetensi_keahlian');
            $table->json('keahlian');
            $table->double('gaji_min');
            $table->double('gaji_max');
            $table->text('persyaratan');
            $table->text('deskripsi');
            $table->date('batas_akhir_lamaran');
            $table->enum('proses_lamaran', ['Online', 'Offline'])->default('Offline');
            $table->enum('status', ['Draf', 'Aktif', 'Nonaktif'])->default('draf');
            $table->string('image', 128);
            $table->smallInteger('jumlah_pelamar')->unsigned()->default(0);
            $table->smallInteger('counter')->unsigend()->default(0);
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
        Schema::dropIfExists('lowongan');
    }
}
