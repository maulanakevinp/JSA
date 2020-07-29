<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIjinKerjaDiKetinggianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ijin_kerja_di_ketinggian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jsa_id')->constrained('jsa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('umum_id')->constrained('umum')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('alat_pelindung_diri_id')->constrained('alat_pelindung_diri')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('dokumen_pendukung_id')->constrained('dokumen_pendukung')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah')->nullable();
            $table->text('keterangan_sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah')->nullable();
            $table->boolean('jarak_ketinggian_sudah_diketahui')->nullable();
            $table->text('keterangan_jarak_ketinggian_sudah_diketahui')->nullable();
            $table->boolean('terdapat_bahaya_angin')->nullable();
            $table->text('keterangan_terdapat_bahaya_angin')->nullable();
            $table->boolean('area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh')->nullable();
            $table->text('keterangan_area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh')->nullable();
            $table->boolean('area_kerja_sudah_terbebas_dari_semua_aliran_listrik')->nullable();
            $table->text('keterangan_area_kerja_sudah_terbebas_dari_semua_aliran_listrik')->nullable();
            $table->boolean('area_kerja_berada_dipermukaan_yang_landai')->nullable();
            $table->text('keterangan_area_kerja_berada_dipermukaan_yang_landai')->nullable();
            $table->boolean('area_kerja_berada_di_permukaan_yang_basah')->nullable();
            $table->text('keterangan_area_kerja_berada_di_permukaan_yang_basah')->nullable();
            $table->boolean('area_kerja_berada_di_ruang_yang_sempit')->nullable();
            $table->text('keterangan_area_kerja_berada_di_ruang_yang_sempit')->nullable();
            $table->boolean('pekerja_bekerja_sendiri')->nullable();
            $table->text('keterangan_pekerja_bekerja_sendiri')->nullable();
            $table->boolean('area_kerja_perlu_dipasang_barikade')->nullable();
            $table->text('keterangan_area_kerja_perlu_dipasang_barikade')->nullable();
            $table->boolean('tersedia_rambu_keselamatan')->nullable();
            $table->text('keterangan_tersedia_rambu_keselamatan')->nullable();
            $table->boolean('alat_perancah_digunakan_pada_pekerjaan_di_ketinggian')->nullable();
            $table->text('keterangan_alat_perancah_digunakan_pada_pekerjaan_di_ketinggian')->nullable();
            $table->boolean('alat_perancah_disusun_oleh_petugas_alat_perancah')->nullable();
            $table->text('keterangan_alat_perancah_disusun_oleh_petugas_alat_perancah')->nullable();
            $table->boolean('komponen_alat_perancah_dalam_kondisi_yang_baik')->nullable();
            $table->text('keterangan_komponen_alat_perancah_dalam_kondisi_yang_baik')->nullable();
            $table->boolean('komponen_alat_perancah_sudah_terpasang')->nullable();
            $table->text('keterangan_komponen_alat_perancah_sudah_terpasang')->nullable();
            $table->boolean('tangga_merupakan_alat_yang_bantu_yang_paling_sesuai')->nullable();
            $table->text('keterangan_tangga_merupakan_alat_yang_bantu_yang_paling_sesuai')->nullable();
            $table->boolean('tangga_dalam_kondisi_layak_dan_sesuai')->nullable();
            $table->text('keterangan_tangga_dalam_kondisi_layak_dan_sesuai')->nullable();
            $table->boolean('tangga_mampu_menahan_gerakan')->nullable();
            $table->text('keterangan_tangga_mampu_menahan_gerakan')->nullable();
            $table->boolean('tangga_memiliki_panjang_yang_cukup')->nullable();
            $table->text('keterangan_tangga_memiliki_panjang_yang_cukup')->nullable();
            $table->boolean('tangga_memiliki_stopper')->nullable();
            $table->text('keterangan_tangga_memiliki_stopper')->nullable();
            $table->boolean('pekerja_menggunakan_peralatan_lain')->nullable();
            $table->text('keterangan_pekerja_menggunakan_peralatan_lain')->nullable();
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
        Schema::dropIfExists('ijin_kerja_di_ketinggian');
    }
}
