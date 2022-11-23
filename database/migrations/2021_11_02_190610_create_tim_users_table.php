<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tim_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::table('tim_user', function (Blueprint $table) {
            $table->bigInteger('id_tim')->unsigned()->after('id');
            $table->foreign('id_tim')->references('id')->on('tim')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('tim_user', function (Blueprint $table) {
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
        Schema::dropIfExists('tim_user');
    }
}
