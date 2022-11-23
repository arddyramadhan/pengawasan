<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToInformasiAwalTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('informasi_awal', function (Blueprint $table) {
			$table->enum('status', ['lengkapi', 'diproses', 'buat_tim', 'tim_dibuat', 'tolak'])->after('alamat_terlapor');
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
			$table->dropColumn('status');
		});
	}
}
