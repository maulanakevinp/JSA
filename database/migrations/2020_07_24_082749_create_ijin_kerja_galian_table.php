<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIjinKerjaGalianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ijin_kerja_galian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jsa_id')->constrained('jsa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('umum_id')->constrained('umum')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('alat_pelindung_diri_id')->constrained('alat_pelindung_diri')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('dokumen_pendukung_id')->constrained('dokumen_pendukung')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pengesahan_id')->constrained('pengesahan')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('jalur_bebas_dari_kabel_listrik')->nullable();
            $table->text('keterangan_jalur_bebas_dari_kabel_listrik')->nullable();
            $table->boolean('jalur_bebas_dari_kabel_telepon')->nullable();
            $table->text('keterangan_jalur_bebas_dari_kabel_telepon')->nullable();
            $table->boolean('jalur_bebas_dari_kabel_instrument')->nullable();
            $table->text('keterangan_jalur_bebas_dari_kabel_instrument')->nullable();
            $table->boolean('jalur_bebas_dari_gorong_gorong')->nullable();
            $table->text('keterangan_jalur_bebas_dari_gorong_gorong')->nullable();
            $table->boolean('jalur_bebas_dari_pipa_air_or_gas_or_minyak')->nullable();
            $table->text('keterangan_jalur_bebas_dari_pipa_air_or_gas_or_minyak')->nullable();
            $table->boolean('dinding_penggalian_perlu_di_topang')->nullable();
            $table->text('keterangan_dinding_penggalian_perlu_di_topang')->nullable();
            $table->boolean('rambu_peringatan_telah_terpasang')->nullable();
            $table->text('keterangan_rambu_peringatan_telah_terpasang')->nullable();
            $table->boolean('lokasi_telah_diberi_batas_or_pengalang')->nullable();
            $table->text('keterangan_lokasi_telah_diberi_batas_or_pengalang')->nullable();
            $table->boolean('lokasi_bebas_dari_area_mudah_terbakar')->nullable();
            $table->text('keterangan_lokasi_bebas_dari_area_mudah_terbakar')->nullable();
            $table->boolean('perlu_dengan_ijin_kerja_yang_lain')->nullable();
            $table->text('keterangan_perlu_dengan_ijin_kerja_yang_lain')->nullable();
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
        Schema::dropIfExists('ijin_kerja_galian');
    }
}
