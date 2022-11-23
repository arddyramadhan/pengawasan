<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdKabupatenKotaToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('id_kabupaten_kota')->unsigned()->nullable()->after('id_tingkatan');
            $table->foreign('id_kabupaten_kota')->references('id')->on('kabupaten_kota')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_id_kabupaten_kota_foreign');
            $table->dropColumn('id_kabupaten_kota');
        });
    }
}
