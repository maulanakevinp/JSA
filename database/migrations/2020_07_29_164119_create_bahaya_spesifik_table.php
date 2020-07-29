<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahayaSpesifikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahaya_spesifik', function (Blueprint $table) {
            $table->id();
            $table->foreignId('langkah_pekerjaan_id')->constrained('langkah_pekerjaan')->onDelete('cascade')->onUpdate('cascade');
            $table->text('deskripsi');
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
        Schema::dropIfExists('bahaya_spesifik');
    }
}
