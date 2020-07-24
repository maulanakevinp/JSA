<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIjinKerjaRadiografiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ijin_kerja_radiografi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jsa_id')->constrained('jsa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('umum_id')->constrained('umum')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('alat_pelindung_diri_id')->constrained('alat_pelindung_diri')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('dokumen_pendukung_id')->constrained('dokumen_pendukung')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pengesahan_id')->constrained('pengesahan')->onDelete('cascade')->onUpdate('cascade');
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('ijin_kerja_radiografi');
    }
}
