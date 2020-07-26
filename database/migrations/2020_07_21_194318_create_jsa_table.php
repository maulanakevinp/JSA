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
            $table->unsignedBigInteger('pereview_id')->nullable();
            $table->foreign('pereview_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('penyetuju_id')->nullable();
            $table->foreign('penyetuju_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_perusahaan', 128)->nullable();
            $table->string('no_jsa', 128)->nullable();
            $table->string('nama_pekerjaan', 128)->nullable();
            $table->string('lokasi', 128)->nullable();
            $table->string('nomor_kontrak', 128)->nullable();
            $table->date('tanggal_kontrak')->nullable();
            $table->date('tanggal_review')->nullable();
            $table->date('tanggal_persetujuan')->nullable();
            $table->string('satuan_kerja_pemberi_kerja', 128)->nullable();
            $table->string('satuan_kerja_penanggung_jawab', 128)->nullable();
            $table->boolean('status_review')->default(0);
            $table->text('alasan_penolakan_review')->nullable();
            $table->boolean('status_persetujuan')->default(0);
            $table->text('alasan_penolakan_persetujuan')->nullable();
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
