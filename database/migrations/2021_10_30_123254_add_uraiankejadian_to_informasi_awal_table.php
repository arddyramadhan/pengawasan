<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUraiankejadianToInformasiAwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informasi_awal', function (Blueprint $table) {
            $table->text('uraian_kejadian')->after('alamat_terlapor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informasi_awal', function (Blueprint $table) {
            $table->dropColumn('uraian_kejadian');
        });
    }
}
