<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelurahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelurahan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 150);
            $table->enum('status', ['kelurahan', 'desa']);
            $table->bigInteger('id_kecamatan')->unsigned()->nullable();
            $table->foreign('id_kecamatan')->references('id')->on('kecamatan')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('id_kelurahan')->unsigned()->nullable()->after('id_kecamatan');
            $table->foreign('id_kelurahan')->references('id')->on('kelurahan')->onDelete('cascade')->onUpdate('cascade');
            $table->text('foto')->nullable()->after('tlp');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelurahan');
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_id_kelurahan_foreign');
            $table->dropColumn('id_kelurahan');
            $table->dropColumn('tlp');
        });
    }
}
