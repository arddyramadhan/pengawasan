<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSaksiToInformasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informasi', function (Blueprint $table) {
			$table->string('saksi1', 100)->nullable()->after('alamat');
			$table->text('alamat1')->nullable()->after('saksi1');
			$table->string('saksi2', 100)->nullable()->after('alamat1');
			$table->text('alamat2')->nullable()->after('saksi2');
			$table->text('img_bukti')->nullable()->after('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informasi', function (Blueprint $table) {
			$table->dropColumn('saksi1');
			$table->dropColumn('alamat1');
			$table->dropColumn('saksi2');
			$table->dropColumn('alamat2');
			$table->dropColumn('img_bukti');
        });
    }
}
