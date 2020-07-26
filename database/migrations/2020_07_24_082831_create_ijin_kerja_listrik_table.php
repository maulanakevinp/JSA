<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIjinKerjaListrikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ijin_kerja_listrik', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jsa_id')->constrained('jsa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('umum_id')->constrained('umum')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('alat_pelindung_diri_id')->constrained('alat_pelindung_diri')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('jalur_telah_dibebaskan_dari_aliran_listrik')->nullable();
            $table->text('keterangan_jalur_telah_dibebaskan_dari_aliran_listrik')->nullable();
            $table->boolean('jalur_peralatan_yang_terkait_telah_aman')->nullable();
            $table->text('keterangan_jalur_peralatan_yang_terkait_telah_aman')->nullable();
            $table->boolean('jalur_telah_pemasangan_kabel')->nullable();
            $table->text('keterangan_jalur_telah_pemasangan_kabel')->nullable();
            $table->boolean('jalur_telah_peralatan_dalam_keadaan_bergerak')->nullable();
            $table->text('keterangan_jalur_telah_peralatan_dalam_keadaan_bergerak')->nullable();
            $table->boolean('jalur_telah_diisolasi_dari_sumber_listrik')->nullable();
            $table->text('keterangan_jalur_telah_diisolasi_dari_sumber_listrik')->nullable();
            $table->boolean('jalur_telah_peralatan_dalam_keadaan_panas')->nullable();
            $table->text('keterangan_jalur_telah_peralatan_dalam_keadaan_panas')->nullable();
            $table->boolean('tersedia_jalan_masuk_dan_keluar_yang_layak')->nullable();
            $table->text('keterangan_tersedia_jalan_masuk_dan_keluar_yang_layak')->nullable();
            $table->boolean('bahan_mudah_terbakar_diamankan')->nullable();
            $table->text('keterangan_bahan_mudah_terbakar_diamankan')->nullable();
            $table->boolean('alat_pemadam_kebaaran_siap_sedia')->nullable();
            $table->text('keterangan_alat_pemadam_kebaaran_siap_sedia')->nullable();
            $table->boolean('petugas_pemadam_kebakaran_siap_sedia')->nullable();
            $table->text('keterangan_petugas_pemadam_kebakaran_siap_sedia')->nullable();
            $table->boolean('pekerjaan_pada_ketinggian_yang_membahayakan')->nullable();
            $table->text('keterangan_pekerjaan_pada_ketinggian_yang_membahayakan')->nullable();
            $table->boolean('perlu_dengan_ijin_kerja_yang_lain')->nullable();
            $table->text('keterangan_perlu_dengan_ijin_kerja_yang_lain')->nullable();
            $table->foreignId('dokumen_pendukung_id')->constrained('dokumen_pendukung')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('petugas_pengawas_id')->constrained('pengesahan')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ijin_kerja_listrik');
    }
}
