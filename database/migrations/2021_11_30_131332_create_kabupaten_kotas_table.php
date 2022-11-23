<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKabupatenKotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kabupaten_kota', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 150);
            $table->enum('status', ['kota', 'kabupaten']);
            $table->string('almt_kecamatan', 150)->nullable();
            $table->string('almt_kel_des', 150)->nullable();
            $table->string('almt_jalan', 250)->nullable();
            $table->text('img_kop')->nullable();
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
        Schema::dropIfExists('kabupaten_kota');
    }
}
