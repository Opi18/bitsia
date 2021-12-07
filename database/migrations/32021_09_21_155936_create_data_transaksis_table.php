<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_users_id');
            $table->foreign('data_users_id')->references('id')->on('data_users');
            $table->unsignedBigInteger('daftar_akuns_id');
            $table->foreign('daftar_akuns_id')->references('id')->on('daftar_akuns');
            $table->string('jenis_transaksi');
            $table->string('keterangan_transaksi');
            $table->integer('nominal_transaksi');
            $table->date('tgl_transaksi');
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
        Schema::dropIfExists('data_transaksis');
    }
}
