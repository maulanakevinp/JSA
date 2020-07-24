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
            $table->boolean('safety_helmet')->default(0);
            $table->boolean('safety_glass')->default(0);
            $table->boolean('goggle')->default(0);
            $table->boolean('face_shield')->default(0);
            $table->boolean('others_kepala')->default(0);
            $table->text('keterangan_others_kepala')->nullable();
            $table->boolean('ear_plug')->default(0);
            $table->boolean('ear_muff')->default(0);
            $table->boolean('others_telinga')->default(0);
            $table->text('keterangan_others_telinga')->nullable();
            $table->boolean('safety_shoes/boot')->default(0);
            $table->boolean('safety_rain_boot')->default(0);
            $table->boolean('electrical_shoes/boot')->default(0);
            $table->boolean('others_kaki')->default(0);
            $table->text('keterangan_others_kaki')->nullable();
            $table->boolean('half_mask_respirator')->default(0);
            $table->boolean('full_face')->default(0);
            $table->boolean('dust_mask')->default(0);
            $table->boolean('scba/airline_set')->default(0);
            $table->boolean('others_pernapasan')->default(0);
            $table->text('keterangan_others_pernapasan')->nullable();
            $table->boolean('cotton_glove')->default(0);
            $table->boolean('leather_glove')->default(0);
            $table->boolean('rubber_glove')->default(0);
            $table->boolean('chemical_glove')->default(0);
            $table->boolean('others_tangan')->default(0);
            $table->text('keterangan_others_tangan')->nullable();
            $table->boolean('coverall')->default(0);
            $table->boolean('chemical_suit')->default(0);
            $table->boolean('apron')->default(0);
            $table->boolean('life_vest')->default(0);
            $table->boolean('others_badan')->default(0);
            $table->text('keterangan_others_badan')->nullable();
            $table->boolean('full_body_harness')->default(0);
            $table->boolean('safety_line')->default(0);
            $table->boolean('others_ketinggian')->default(0);
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
