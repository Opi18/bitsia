<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuBesarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_besars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jurnal_umums_id');
            $table->foreign('jurnal_umums_id')->references('id')->on('jurnal_umums');
            $table->unsignedBigInteger('daftar_akuns_id');
            $table->foreign('daftar_akuns_id')->references('id')->on('daftar_akuns');
            $table->date('tgl_bb');
            $table->string('keterangan_bb');
            $table->integer('debet_bb');
            $table->integer('kredit_bb');
            $table->integer('saldo_debet_bb');
            $table->integer('saldo_kredit_bb');
            $table->date('periode_bb');
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
        Schema::dropIfExists('buku_besars');
    }
}
