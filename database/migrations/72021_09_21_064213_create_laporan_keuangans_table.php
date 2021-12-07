<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanKeuangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_keuangans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('neraca_saldos_id');
            $table->foreign('neraca_saldos_id')->references('id')->on('neraca_saldos');
            $table->unsignedBigInteger('daftar_akuns_id');
            $table->foreign('daftar_akuns_id')->references('id')->on('daftar_akuns');
            $table->string('jenis_laporan');
            $table->string('keterangan_lk');
            $table->integer('nominal_lk');
            $table->date('periode_lk');
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
        Schema::dropIfExists('laporan_keuangans');
    }
}
