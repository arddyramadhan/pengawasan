<?php

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasisTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('informasi', function (Blueprint $table) {
			$table->id();
			$table->string('nama', 30)->nullable();
			$table->string('ktp', 50)->nullable();
			$table->string('telp', 20)->nullable();
			$table->string('alamat', 100)->nullable();
			$table->text('deskripsi');
			$table->date('tgl')->nullable();
			$table->enum('status', ['antrian', 'dibaca', 'ditangani', 'diproses',  'Ditolak', 'alihkan']);
			$table->string('keterangan', 100)->nullable();
			$table->timestamps();
		});
		Schema::table('informasi', function (Blueprint $table) {
			$table->timestamp('waktu_kejadian')->after('alamat')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('informasi');
	}
}
