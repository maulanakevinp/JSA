<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIjinKerjaPanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ijin_kerja_panas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jsa_id')->constrained('jsa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('umum_id')->constrained('umum')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('jenis_pekerjaan_id')->constrained('jenis_pekerjaan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('sumber_bahaya_alat_id')->constrained('sumber_bahaya_alat')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('alat_pelindung_diri_id')->constrained('alat_pelindung_diri')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('dokumen_pendukung_id')->constrained('dokumen_pendukung')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('jalur_dibebaskan_dari_tekanan')->default(0);
            $table->boolean('jalur_dikosongkan_atau_drain')->default(0);
            $table->boolean('jalur_diisolasi_dengan_blanking')->default(0);
            $table->boolean('jalur_diisolasi_dengan_dilepas')->default(0);
            $table->boolean('jalur_diisolasi_dengan_kerangan_dikunci')->default(0);
            $table->boolean('jalur_diisolasi_dengan_diberi_label')->default(0);
            $table->boolean('jalur_didorong_atau_flush_dengan_air')->default(0);
            $table->boolean('jalur_dinginkan_secara_alamiah_atau_mekanis')->default(0);
            $table->boolean('semua_saluran_drain_dan_kerangan_pada_jarak_15m')->default(0);
            $table->boolean('bahan_mudah_terbakar_diamankan')->default(0);
            $table->boolean('alat_pemadam_kebakaran_siap_sedia')->default(0);
            $table->boolean('petugas_pemadam_kebakaran_siap_sedia')->default(0);
            $table->boolean('semua_peralatan_las_telah_diamankan')->default(0);
            $table->boolean('pekerjaan_harus_terus_dibasahi_dengan_air')->default(0);
            $table->boolean('perlu_dengan_ijin_kerja_yang_lain')->default(0);
            $table->boolean('semua_mesin_telah_diamankan')->default(0);
            $table->boolean('semua_pekerjaan_telah_disetujui_untuk_penggalian')->default(0);
            $table->boolean('semua_peralatan_listrik_telah_diisolasi')->default(0);
            $table->boolean('semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang')->default(0);
            $table->text('keterangan_jalur_dibebaskan_dari_tekanan')->nullable();
            $table->text('keterangan_jalur_dikosongkan_atau_drain')->nullable();
            $table->text('keterangan_jalur_diisolasi_dengan_blanking')->nullable();
            $table->text('keterangan_jalur_diisolasi_dengan_dilepas')->nullable();
            $table->text('keterangan_jalur_diisolasi_dengan_kerangan_dikunci')->nullable();
            $table->text('keterangan_jalur_diisolasi_dengan_diberi_label')->nullable();
            $table->text('keterangan_jalur_didorong_atau_flush_dengan_air')->nullable();
            $table->text('keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis')->nullable();
            $table->text('keterangan_semua_saluran_drain_dan_kerangan_pada_jarak_15m')->nullable();
            $table->text('keterangan_bahan_mudah_terbakar_diamankan')->nullable();
            $table->text('keterangan_alat_pemadam_kebakaran_siap_sedia')->nullable();
            $table->text('keterangan_petugas_pemadam_kebakaran_siap_sedia')->nullable();
            $table->text('keterangan_semua_peralatan_las_telah_diamankan')->nullable();
            $table->text('keterangan_pekerjaan_harus_terus_dibasahi_dengan_air')->nullable();
            $table->text('keterangan_perlu_dengan_ijin_kerja_yang_lain')->nullable();
            $table->text('keterangan_semua_mesin_telah_diamankan')->nullable();
            $table->text('keterangan_semua_pekerjaan_telah_disetujui_untuk_penggalian')->nullable();
            $table->text('keterangan_semua_peralatan_listrik_telah_diisolasi')->nullable();
            $table->text('keterangan_semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang')->nullable();
            $table->foreignId('uji_kandungan_gas_id')->constrained('uji_kandungan_gas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('petugas_pengawas_id')->constrained('petugas_pengawas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ijin_kerja_panas');
    }
}
