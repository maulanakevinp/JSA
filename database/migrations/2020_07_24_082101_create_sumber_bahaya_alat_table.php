<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSumberBahayaAlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sumber_bahaya_alat', function (Blueprint $table) {
            $table->id();
            $table->boolean('alat_listrik')->default(0);
            $table->boolean('moving_part')->default(0);
            $table->boolean('crane')->default(0);
            $table->boolean('generator/compressor')->default(0);
            $table->boolean('akses_sulit')->default(0);
            $table->boolean('gas')->default(0);
            $table->boolean('bahan_kimia')->default(0);
            $table->boolean('bising')->default(0);
            $table->boolean('kejatuhan')->default(0);
            $table->boolean('media_panas/dingin')->default(0);
            $table->boolean('ergonomi')->default(0);
            $table->boolean('bertekanan')->default(0);
            $table->boolean('mudah_terbakar')->default(0);
            $table->boolean('biologi')->default(0);
            $table->boolean('blasting')->default(0);
            $table->boolean('penggalan')->default(0);
            $table->boolean('hot_tapping')->default(0);
            $table->boolean('pengelasan')->default(0);
            $table->boolean('grinding')->default(0);
            $table->boolean('cuaca_buruk')->default(0);
            $table->boolean('materi_berbahaya')->default(0);
            $table->boolean('pilling')->default(0);
            $table->boolean('paparang_panas_matahari')->default(0);
            $table->boolean('pigging')->default(0);
            $table->boolean('lifting')->default(0);
            $table->boolean('drilling')->default(0);
            $table->boolean('uji_bertekanan')->default(0);
            $table->boolean('hot_cutting')->default(0);
            $table->boolean('bongkar_muat')->default(0);
            $table->boolean('power_bushing')->default(0);
            $table->boolean('interlock_bypass')->default(0);
            $table->boolean('lainnya')->default(0);
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
        Schema::dropIfExists('sumber_bahaya_alat');
    }
}
