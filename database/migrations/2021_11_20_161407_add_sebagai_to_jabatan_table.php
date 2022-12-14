<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSebagaiToJabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jabatan', function (Blueprint $table) {
            $table->enum('sebagai', ['ketua', 'anggota', 'staf', 'desa', 'tps'])->nullable()->after('nm_jabatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jabatan', function (Blueprint $table) {
            $table->dropColumn('sebagai');
        });
    }
}
