<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPerluIjinKerjaToJsaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jsa', function (Blueprint $table) {
            $table->boolean('perlu_ijin_kerja')->nullable()->after('alasan_penolakan_persetujuan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jsa', function (Blueprint $table) {
            //
        });
    }
}
