<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusPersetujuanToUmumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('umum', function (Blueprint $table) {
            $table->boolean('status_persetujuan')->default(0)->after('uraian_pekerjaan');
            $table->text('alasan_penolakan_persetujuan')->nullable()->after('status_persetujuan');
            $table->boolean('status_persetujuan_dilihat')->default(0)->nullable()->after('alasan_penolakan_persetujuan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('umum', function (Blueprint $table) {
            //
        });
    }
}
