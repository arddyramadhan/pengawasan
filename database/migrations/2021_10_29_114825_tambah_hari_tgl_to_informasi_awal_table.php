<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahHariTglToInformasiAwalTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('informasi_awal', function (Blueprint $table) {
			$table->timestamp('waktu_tgl_kejadian')->after('tempat_kejadian')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('informasi_awal', function (Blueprint $table) {
			$table->dropColumn('waktu_tgl_kejadian');
		});
	}
}
