<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMulaiSelesaiToLhpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lhp', function (Blueprint $table) {
            $table->timestamp('mulai')->nullable()->after('diawasi');
			$table->timestamp('selesai')->nullable()->after('mulai');
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
			$table->dropColumn('mulai');
			$table->dropColumn('selesai');
        });
    }
}
