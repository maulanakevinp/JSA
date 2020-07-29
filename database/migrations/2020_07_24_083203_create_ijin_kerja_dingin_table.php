<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIjinKerjaDinginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ijin_kerja_dingin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jsa_id')->constrained('jsa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('umum_id')->constrained('umum')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('sumber_bahaya_alat_id')->constrained('sumber_bahaya_alat')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('alat_pelindung_diri_id')->constrained('alat_pelindung_diri')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('dokumen_pendukung_id')->constrained('dokumen_pendukung')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('jalur_dibebaskan_dari_tekanan')->nullable()->default(0);
            $table->boolean('jalur_dikosongkan_atau_drain')->nullable()->default(0);
            $table->boolean('jalur_diisolasi_dengan_blanking')->nullable()->default(0);
            $table->boolean('jalur_diisolasi_dengan_dilepas')->nullable()->default(0);
            $table->boolean('jalur_diisolasi_dengan_kerangan_dikunci')->nullable()->default(0);
            $table->boolean('jalur_diisolasi_dengan_diberi_label')->nullable()->default(0);
            $table->boolean('jalur_didorong_atau_flush_dengan_air')->nullable()->default(0);
            $table->boolean('jalur_steaming_out_or_purging')->nullable()->default(0);
            $table->boolean('jalur_dinginkan_secara_alamiah_atau_mekanis')->nullable()->default(0);
            $table->boolean('semua_pekerjaan_disetujui_untuk_penggalian')->nullable()->default(0);
            $table->boolean('perlu_dengan_ijin_kerja_yang_lain')->nullable()->default(0);
            $table->boolean('perlu_dilakukan_uji_kandungan_gas')->nullable()->default(0);
            $table->boolean('semua_peralatan_listrik_telah_diisolasi')->nullable()->default(0);
            $table->boolean('semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang')->nullable()->default(0);
            $table->text('keterangan_jalur_dibebaskan_dari_tekanan')->nullable();
            $table->text('keterangan_jalur_dikosongkan_atau_drain')->nullable();
            $table->text('keterangan_jalur_diisolasi_dengan_blanking')->nullable();
            $table->text('keterangan_jalur_diisolasi_dengan_dilepas')->nullable();
            $table->text('keterangan_jalur_diisolasi_dengan_kerangan_dikunci')->nullable();
            $table->text('keterangan_jalur_diisolasi_dengan_diberi_label')->nullable();
            $table->text('keterangan_jalur_didorong_atau_flush_dengan_air')->nullable();
            $table->text('keterangan_jalur_steaming_out_or_purging')->nullable();
            $table->text('keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis')->nullable();
            $table->text('keterangan_semua_pekerjaan_disetujui_untuk_penggalian')->nullable();
            $table->text('keterangan_perlu_dengan_ijin_kerja_yang_lain')->nullable();
            $table->text('keterangan_perlu_dilakukan_uji_kandungan_gas')->nullable();
            $table->text('keterangan_semua_peralatan_listrik_telah_diisolasi')->nullable();
            $table->text('keterangan_semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang')->nullable();
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
        Schema::dropIfExists('ijin_kerja_dingin');
    }
}
