<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLhpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lhp', function (Blueprint $table) {
            $table->id();
            $table->text('tahapan')->nullable();
            $table->enum('bentuk', ['langsung', 'tidak']);
            $table->text('diawasi')->nullable();
            $table->text('lokasi')->nullable();
            $table->text('uraian_hasil')->nullable();
            $table->enum('dugaan', ['ada', 'tidak', 'pleno', 'belum']);
            $table->enum('status_lhp', ['pengawasan', 'penelusuran']);
            $table->text('tempat_kejadian')->nullable();
            $table->date('waktu_kejadian')->nullable();
            $table->string('status_pelaku', 100)->nullable();
            $table->text('uraian_dugaan')->nullable();
            $table->timestamps();
        });

        Schema::table('lhp', function (Blueprint $table) {
            $table->bigInteger('id_tim')->unsigned()->after('id')->nullable();
            $table->foreign('id_tim')->references('id')->on('tim')->onUpdate('cascade')->onUpdate('cascade');
        });

        Schema::table('lhp', function (Blueprint $table) {
            $table->bigInteger('id_user')->unsigned()->after('id_tim')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lhp');
    }
}
