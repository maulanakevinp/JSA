<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umum', function (Blueprint $table) {
            $table->id();
            $table->string('nomor', 128);
            $table->date('tanggal_pengesahan');
            $table->timestamp('tanggal_mulai')->nullable();
            $table->timestamp('tanggal_selesai')->nullable();
            $table->string('lokasi_pekerjaan', 128);
            $table->string('pelaksana_pekerjaan', 128);
            $table->text('uraian_pekerjaan');
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
        Schema::dropIfExists('umum');
    }
}
