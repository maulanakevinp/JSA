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
            $table->boolean('alat_listrik')->nullable()->default(0);
            $table->boolean('moving_part')->nullable()->default(0);
            $table->boolean('crane')->nullable()->default(0);
            $table->boolean('generator_or_compressor')->nullable()->default(0);
            $table->boolean('akses_sulit')->nullable()->default(0);
            $table->boolean('gas')->nullable()->default(0);
            $table->boolean('bahan_kimia')->nullable()->default(0);
            $table->boolean('bising')->nullable()->default(0);
            $table->boolean('kejatuhan')->nullable()->default(0);
            $table->boolean('media_panas_or_dingin')->nullable()->default(0);
            $table->boolean('ergonomi')->nullable()->default(0);
            $table->boolean('bertekanan')->nullable()->default(0);
            $table->boolean('mudah_terbakar')->nullable()->default(0);
            $table->boolean('biologi')->nullable()->default(0);
            $table->boolean('blasting')->nullable()->default(0);
            $table->boolean('penggalan')->nullable()->default(0);
            $table->boolean('hot_tapping_sumber_bahaya_alat')->nullable()->default(0);
            $table->boolean('pengelasan')->nullable()->default(0);
            $table->boolean('grinding')->nullable()->default(0);
            $table->boolean('cuaca_buruk')->nullable()->default(0);
            $table->boolean('materi_berbahaya')->nullable()->default(0);
            $table->boolean('pilling')->nullable()->default(0);
            $table->boolean('paparang_panas_matahari')->nullable()->default(0);
            $table->boolean('pigging')->nullable()->default(0);
            $table->boolean('lifting')->nullable()->default(0);
            $table->boolean('drilling')->nullable()->default(0);
            $table->boolean('blowdown')->nullable()->default(0);
            $table->boolean('uji_bertekanan')->nullable()->default(0);
            $table->boolean('hot_cutting')->nullable()->default(0);
            $table->boolean('bongkar_muat')->nullable()->default(0);
            $table->boolean('power_bushing')->nullable()->default(0);
            $table->boolean('interlock_bypass')->nullable()->default(0);
            $table->boolean('lainnya_sumber_bahaya_alat')->nullable()->default(0);
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
