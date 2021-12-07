<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_akuns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_users_id');
            $table->foreign('data_users_id')->references('id')->on('data_users');
            $table->integer('kode_akun');
            $table->string('nama_akun');
            $table->string('tipe_akun');
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
        Schema::dropIfExists('daftar_akuns');
    }
}
