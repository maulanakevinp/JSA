<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetugasPengawasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas_pengawas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_petugas_isolasi_listrik', 64);
            $table->string('jabatan_petugas_isolasi_listrik', 64);
            $table->date('tanggal_petugas_isolasi_listrik');
            $table->string('nama_petugas_uji_kandungan_gas', 64);
            $table->string('jabatan_petugas_uji_kandungan_gas', 64);
            $table->date('tanggal_petugas_uji_kandungan_gas');
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
        Schema::dropIfExists('petugas_pengawas');
    }
}
