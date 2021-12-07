<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeracaSaldosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neraca_saldos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buku_besars_id');
            $table->foreign('buku_besars_id')->references('id')->on('buku_besars');
            $table->unsignedBigInteger('daftar_akuns_id');
            $table->foreign('daftar_akuns_id')->references('id')->on('daftar_akuns');
            $table->integer('debet_ns');
            $table->integer('kredit_ns');
            $table->date('periode_ns');
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
        Schema::dropIfExists('neraca_saldos');
    }
}
