<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJsaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jsa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengaju_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pereview_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('penyetuju_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('no_jsa');
            $table->string('nama_pekerjaan');
            $table->string('lokasi');
            $table->string('nomor_kontrak');
            $table->date('tanggal_kontrak');
            $table->date('tanggal_review')->nullable();
            $table->date('tanggal_persetujuan')->nullable();
            $table->string('satuan_kerja_pemberi_kerja')->nullable();
            $table->string('satuan_kerja_penanggung_jawab')->nullable();
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
        Schema::dropIfExists('jsa');
    }
}
