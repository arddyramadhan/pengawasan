<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNmLainnyaToTingkatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tingkatan', function (Blueprint $table) {
            $table->enum('lainnya', ['Bawaslu', 'Panwaslu','Panwas', 'PTPS'])->after('nm_tingkatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tingkatan', function (Blueprint $table) {
            $table->dropColumn('lainnya');
        });
    }
}
