<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToBeritaAcaraDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('berita_acara_detail', function (Blueprint $table) {
            $table->enum('status', ['pembuka','kasus','penutup']);
        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::table('berita_acara_detail', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
