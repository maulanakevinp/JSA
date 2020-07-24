<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisPekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->boolean('menimbulkan_api')->default(0);
            $table->boolean('menimbulkan_bunga_api')->default(0);
            $table->boolean('alat_potong')->default(0);
            $table->boolean('hot_tapping')->default(0);
            $table->boolean('menyalakan_flare')->default(0);
            $table->boolean('lainnya')->default(0);
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
        Schema::dropIfExists('jenis_pekerjaan');
    }
}
