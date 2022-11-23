<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBatasWaktuPengisianToTableLhp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lhp', function (Blueprint $table) {
            $table->timestamp('batas_waktu_pengisian')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lhp', function (Blueprint $table) {
            $table->dropColumn('batas_waktu_pengisian');
        });
    }
}
