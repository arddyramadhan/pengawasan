<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecamatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 150);
            $table->bigInteger('id_kabupaten_kota')->unsigned()->nullable();
            $table->foreign('id_kabupaten_kota')->references('id')->on('kabupaten_kota')->onDelete('cascade')->onUpdate('cascade');
            $table->string('almt_kecamatan', 150)->nullable();
            $table->string('almt_kel_des', 150)->nullable();
            $table->string('almt_jalan', 250)->nullable();
            $table->string('email', 150)->nullable();
            $table->text('img_kop')->nullable();
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('id_kecamatan')->unsigned()->nullable()->after('id_kabupaten_kota');
            $table->foreign('id_kecamatan')->references('id')->on('kecamatan')->onDelete('cascade')->onUpdate('cascade');
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
            $table->dropForeign('users_id_kecamatan_foreign');
            $table->dropColumn('id_kecamatan');
        });
        Schema::dropIfExists('kecamatan');
    }
}
