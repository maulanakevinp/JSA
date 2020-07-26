<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIjinKerjaRuangTerbatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ijin_kerja_ruang_terbatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jsa_id')->constrained('jsa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('umum_id')->constrained('umum')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('alat_pelindung_diri_id')->constrained('alat_pelindung_diri')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('dokumen_pendukung_id')->constrained('dokumen_pendukung')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('ruang_terbatas_dibebaskan_dari_tekanan')->nullable();
            $table->text('keterangan_ruang_terbatas_dibebaskan_dari_tekanan')->nullable();
            $table->boolean('ruang_terbatas_dikosongkan_atau_drain')->nullable();
            $table->text('keterangan_ruang_terbatas_dikosongkan_atau_drain')->nullable();
            $table->boolean('ruang_terbatas_diisolasi')->nullable();
            $table->text('keterangan_ruang_terbatas_diisolasi')->nullable();
            $table->boolean('listrik_or_hidrolik_diluar_dan_didalam_ruangan')->nullable();
            $table->text('keterangan_listrik_or_hidrolik_diluar_dan_didalam_ruangan')->nullable();
            $table->boolean('aman_dari_kandungan_gas_beracun_dan_mudah_terbakar')->nullable();
            $table->text('keterangan_aman_dari_kandungan_gas_beracun_dan_mudah_terbakar')->nullable();
            $table->boolean('kandungan_oksigen_mencukupi')->nullable();
            $table->text('keterangan_kandungan_oksigen_mencukupi')->nullable();
            $table->boolean('ventilasi_udara_pembantu_tersedia')->nullable();
            $table->text('keterangan_ventilasi_udara_pembantu_tersedia')->nullable();
            $table->boolean('terdapat_kerja_panas_di_ruangan_terbatas')->nullable();
            $table->text('keterangan_terdapat_kerja_panas_di_ruangan_terbatas')->nullable();
            $table->boolean('terdapat_pekerjaan_radiografi_di_ruangan_terbatas')->nullable();
            $table->text('keterangan_terdapat_pekerjaan_radiografi_di_ruangan_terbatas')->nullable();
            $table->boolean('perlu_dengan_ijin_kerja_yang_lain')->nullable();
            $table->text('keterangan_perlu_dengan_ijin_kerja_yang_lain')->nullable();
            $table->boolean('peringatan_bahaya_dan_tanda_batas_tersedia')->nullable();
            $table->text('keterangan_peringatan_bahaya_dan_tanda_batas_tersedia')->nullable();
            $table->boolean('semua_alat_kerja_penunjang_aman_untuk_digunakan')->nullable();
            $table->text('keterangan_semua_alat_kerja_penunjang_aman_untuk_digunakan')->nullable();
            $table->boolean('pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas')->nullable();
            $table->text('keterangan_pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas')->nullable();
            $table->boolean('semua_pekerja_telah_lengkap_alat_pelindung_diri')->nullable();
            $table->text('keterangan_semua_pekerja_telah_lengkap_alat_pelindung_diri')->nullable();
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
        Schema::dropIfExists('ijin_kerja_ruang_terbatas');
    }
}
