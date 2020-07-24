<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenPendukungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_pendukung', function (Blueprint $table) {
            $table->id();
            $table->text('a')->nullable();
            $table->text('b')->nullable();
            $table->text('c')->nullable();
            $table->text('d')->nullable();
            $table->text('e')->nullable();
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
        Schema::dropIfExists('dokumen_pendukung');
    }
}
