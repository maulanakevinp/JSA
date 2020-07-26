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
            $table->string('nama_perusahaan', 128);
            $table->string('no_lisensi', 128);
            $table->string('sumber_radioaktif', 128);
            $table->string('proyektor', 128);
            $table->string('survey_meter', 128);
            $table->date('tanggal_service');
            $table->date('tanggal_kalibrasi');
            $table->foreignId('dokumen_pendukung_id')->constrained('dokumen_pendukung')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('peralatan_dapat_dioperasikan_jarak_jauh')->nullable();
            $table->text('keterangan_peralatan_dapat_dioperasikan_jarak_jauh')->nullable();
            $table->boolean('petugas_pemadam_kebakaran_siap_sedia')->nullable();
            $table->text('keterangan_petugas_pemadam_kebakaran_siap_sedia')->nullable();
            $table->boolean('penghalang_dan_tanda_bahaya_radiasi_siap_tersedia')->nullable();
            $table->text('keterangan_penghalang_dan_tanda_bahaya_radiasi_siap_tersedia')->nullable();
            $table->boolean('daerah_bebas_dari_orang_tidak_berkepentingan')->nullable();
            $table->text('keterangan_daerah_bebas_dari_orang_tidak_berkepentingan')->nullable();
            $table->boolean('hubungan_radio_hanya_dengan_ccr')->nullable();
            $table->text('keterangan_hubungan_radio_hanya_dengan_ccr')->nullable();
            $table->boolean('semua_peralatan_las_telah_diamankan')->nullable();
            $table->text('keterangan_semua_peralatan_las_telah_diamankan')->nullable();
            $table->boolean('pembacaan_hasil_pengukuran_pada_pagar_penghalang')->nullable();
            $table->text('keterangan_pembacaan_hasil_pengukuran_pada_pagar_penghalang')->nullable();
            $table->boolean('alat_pemadam_api_siap_sedia')->nullable();
            $table->text('keterangan_alat_pemadam_api_siap_sedia')->nullable();
            $table->boolean('perlu_dengan_ijin_kerja_yang_lain')->nullable();
            $table->text('keterangan_perlu_dengan_ijin_kerja_yang_lain')->nullable();
            $table->boolean('semua_pekerjaan_telah_lengkap_alat_pelindung_diri')->nullable();
            $table->text('keterangan_semua_pekerjaan_telah_lengkap_alat_pelindung_diri')->nullable();
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
