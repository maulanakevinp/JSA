<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjiKandunganGasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uji_kandungan_gas', function (Blueprint $table) {
            $table->id();
            $table->boolean('o2')->default(0);
            $table->boolean('sebelum_pelaksanaan_pekerjaan1')->default(0);
            $table->boolean('saat_pelaksanaan_pekerjaan_setiap1')->default(0);
            $table->timestamp('waktu_pelaksanaan_pekerjaan1')->nullable();
            $table->boolean('toxic')->default(0);
            $table->boolean('sebelum_pelaksanaan_pekerjaan2')->default(0);
            $table->boolean('saat_pelaksanaan_pekerjaan_setiap2')->default(0);
            $table->timestamp('waktu_pelaksanaan_pekerjaan2')->nullable();
            $table->boolean('combustible')->default(0);
            $table->boolean('sebelum_pelaksanaan_pekerjaan3')->default(0);
            $table->boolean('saat_pelaksanaan_pekerjaan_setiap3')->default(0);
            $table->timestamp('waktu_pelaksanaan_pekerjaan3')->nullable();
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
        Schema::dropIfExists('uji_kandungan_gas');
    }
}
