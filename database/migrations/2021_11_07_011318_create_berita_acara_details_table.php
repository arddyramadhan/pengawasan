<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaAcaraDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita_acara_detail', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_berita_acara')->unsigned();
            $table->foreign('id_berita_acara')->references('id')->on('berita_acara')->onUpdate('cascade')->onUpdate('cascade');
            $table->text('pertanyaan');
            $table->text('jawaban')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita_acara_detail');
    }
}
