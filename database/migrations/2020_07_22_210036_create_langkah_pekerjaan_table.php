<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLangkahPekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('langkah_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jsa_id')->constrained('jsa')->onDelete('cascade')->onUpdate('cascade');
            $table->text('urutan_langkah_langkah_pekerjaan');
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
        Schema::dropIfExists('langkah_pekerjaan');
    }
}
