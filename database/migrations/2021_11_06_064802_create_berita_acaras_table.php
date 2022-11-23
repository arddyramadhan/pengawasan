<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaAcarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita_acara', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('tmpt_lahir', 100);
            $table->date('tgl_lahir');
            $table->string('pekerjaan', 25);
            $table->string('agama',20);
            $table->string('tinggal', 100);
            $table->timestamps();
        });
        Schema::table('berita_acara', function (Blueprint $table) {
            $table->bigInteger('id_tim')->unsigned()->after('id');
            $table->foreign('id_tim')->references('id')->on('tim')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('berita_acara', function (Blueprint $table) {
            $table->bigInteger('id_user')->unsigned()->after('id_tim');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita_acara');
    }
}
