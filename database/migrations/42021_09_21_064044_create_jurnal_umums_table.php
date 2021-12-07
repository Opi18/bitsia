<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalUmumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_umums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('daftar_akuns_id');
            $table->foreign('daftar_akuns_id')->references('id')->on('daftar_akuns');
            $table->unsignedBigInteger('data_transaksis_id');
            $table->foreign('data_transaksis_id')->references('id')->on('data_transaksis');
            $table->date('tgl_ju');
            $table->integer('debet_ju');
            $table->integer('kredit_ju');
            $table->date('periode_ju');
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
        Schema::dropIfExists('jurnal_umums');
    }
}
