<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ijin_kerja_di_ketinggian_id')->nullable();
            $table->unsignedBigInteger('ijin_kerja_galian_id')->nullable();
            $table->unsignedBigInteger('ijin_kerja_listrik_id')->nullable();
            $table->unsignedBigInteger('ijin_kerja_ruang_terbatas_id')->nullable();
            $table->unsignedBigInteger('ijin_kerja_panas_id')->nullable();
            $table->unsignedBigInteger('ijin_kerja_dingin_id')->nullable();
            $table->unsignedBigInteger('ijin_kerja_radiografi_id')->nullable();
            $table->date('validasi_hari');
            $table->time('validasi_mulai_hari');
            $table->time('validasi_selesai_hari');
            $table->string('nama_pelaksana', 64);
            $table->string('inisial_pelaksana', 64);
            $table->string('nama_pengawas', 64);
            $table->string('inisial_pengawas', 64);
            $table->timestamps();

            $table->foreign('ijin_kerja_di_ketinggian_id')->references('id')->on('ijin_kerja_di_ketinggian')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ijin_kerja_galian_id')->references('id')->on('ijin_kerja_galian')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ijin_kerja_listrik_id')->references('id')->on('ijin_kerja_listrik')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ijin_kerja_ruang_terbatas_id')->references('id')->on('ijin_kerja_ruang_terbatas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ijin_kerja_panas_id')->references('id')->on('ijin_kerja_panas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ijin_kerja_dingin_id')->references('id')->on('ijin_kerja_dingin')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ijin_kerja_radiografi_id')->references('id')->on('ijin_kerja_radiografi')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('validasi');
    }
}
