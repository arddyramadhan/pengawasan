<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelakusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaku', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_lhp')->unsigned();
            $table->foreign('id_lhp')->references('id')->on('lhp')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama', 50);
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
        Schema::dropIfExists('pelaku');
    }
}
