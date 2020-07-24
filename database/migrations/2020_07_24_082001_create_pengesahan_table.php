<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengesahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengesahan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelaksana_pekerjaan', 64);
            $table->string('jabatan_pelaksana_pekerjaan', 64);
            $table->date('tanggal_pelaksana_pekerjaan');
            $table->string('nama_penanggung_jawab_area', 64);
            $table->string('jabatan_penanggung_jawab_area', 64);
            $table->date('tanggal_penanggung_jawab_area');
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
        Schema::dropIfExists('pengesahan');
    }
}
