<?php

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiAwalBuktisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi_awal_bukti', function (Blueprint $table) {
            $table->id();
            $table->text('nama')->nullable();
            $table->bigInteger('id_informasi_awal')->unsigned()->nullable();
            $table->foreign('id_informasi_awal')->references('id')->on('informasi_awal')->onDelete('cascade')->onUpdate('cascade');
            $table->text('foto')->nullable();
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
        Schema::dropIfExists('informasi_awal_bukti');
    }
}
