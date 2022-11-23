<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiAwalsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('informasi_awal', function (Blueprint $table) {
			$table->id();
			$table->string('peristiwa')->nullable();
			$table->string('tempat_kejadian')->nullable();
			$table->string('terlapor')->nullable();
			$table->string('alamat_terlapor')->nullable();
			$table->timestamps();
		});	
		Schema::table('informasi_awal', function (Blueprint $table) {
			$table->bigInteger('id_user')->unsigned()->after('id')->nullable();
			$table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
		});
		Schema::table('informasi_awal', function (Blueprint $table) {
			$table->bigInteger('id_informasi')->unsigned()->after('id_user')->nullable();
			$table->foreign('id_informasi')->references('id')->on('informasi')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::dropIfExists('informasi_awal');
	}
}
