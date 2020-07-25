<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlatPelindungDiriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alat_pelindung_diri', function (Blueprint $table) {
            $table->id();
            $table->boolean('safety_helmet')->nullable()->default(0);
            $table->boolean('safety_glass')->nullable()->default(0);
            $table->boolean('goggle')->nullable()->default(0);
            $table->boolean('face_shield')->nullable()->default(0);
            $table->boolean('others_kepala')->nullable()->default(0);
            $table->text('keterangan_others_kepala')->nullable();
            $table->boolean('ear_plug')->nullable()->default(0);
            $table->boolean('ear_muff')->nullable()->default(0);
            $table->boolean('others_telinga')->nullable()->default(0);
            $table->text('keterangan_others_telinga')->nullable();
            $table->boolean('safety_shoes_or_boot')->nullable()->default(0);
            $table->boolean('safety_rain_boot')->nullable()->default(0);
            $table->boolean('electrical_shoes_or_boot')->nullable()->default(0);
            $table->boolean('others_kaki')->nullable()->default(0);
            $table->text('keterangan_others_kaki')->nullable();
            $table->boolean('half_mask_respirator')->nullable()->default(0);
            $table->boolean('full_face')->nullable()->default(0);
            $table->boolean('dust_mask')->nullable()->default(0);
            $table->boolean('scba_or_airline_set')->nullable()->default(0);
            $table->boolean('others_pernapasan')->nullable()->default(0);
            $table->text('keterangan_others_pernapasan')->nullable();
            $table->boolean('cotton_glove')->nullable()->default(0);
            $table->boolean('leather_glove')->nullable()->default(0);
            $table->boolean('rubber_glove')->nullable()->default(0);
            $table->boolean('chemical_glove')->nullable()->default(0);
            $table->boolean('others_tangan')->nullable()->default(0);
            $table->text('keterangan_others_tangan')->nullable();
            $table->boolean('coverall')->nullable()->default(0);
            $table->boolean('chemical_suit')->nullable()->default(0);
            $table->boolean('apron')->nullable()->default(0);
            $table->boolean('life_vest')->nullable()->default(0);
            $table->boolean('others_badan')->nullable()->default(0);
            $table->text('keterangan_others_badan')->nullable();
            $table->boolean('full_body_harness')->nullable()->default(0);
            $table->boolean('safety_line')->nullable()->default(0);
            $table->boolean('others_ketinggian')->nullable()->default(0);
            $table->text('keterangan_others_ketinggian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.W
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alat_pelindung_diri');
    }
}
