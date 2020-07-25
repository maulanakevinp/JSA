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
            $table->boolean('o2')->nullable()->default(0);
            $table->boolean('sebelum_pelaksanaan_pekerjaan1')->nullable()->default(0);
            $table->boolean('saat_pelaksanaan_pekerjaan_setiap1')->nullable()->default(0);
            $table->string('waktu_pelaksanaan_pekerjaan1', 64)->nullable();
            $table->boolean('toxic')->nullable()->default(0);
            $table->boolean('sebelum_pelaksanaan_pekerjaan2')->nullable()->default(0);
            $table->boolean('saat_pelaksanaan_pekerjaan_setiap2')->nullable()->default(0);
            $table->string('waktu_pelaksanaan_pekerjaan2', 64)->nullable();
            $table->boolean('combustible')->nullable()->default(0);
            $table->boolean('sebelum_pelaksanaan_pekerjaan3')->nullable()->default(0);
            $table->boolean('saat_pelaksanaan_pekerjaan_setiap3')->nullable()->default(0);
            $table->string('waktu_pelaksanaan_pekerjaan3', 64)->nullable();
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
