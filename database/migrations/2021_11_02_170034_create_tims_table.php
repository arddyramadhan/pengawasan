<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tim', function (Blueprint $table) {
			$table->id();
			$table->string('nama', 200)->nullable();
			$table->text('file_sk')->nullable();
			$table->timestamps();
		});
		Schema::table('tim', function (Blueprint $table) {
			$table->bigInteger('id_informasi_awal')->unsigned()->after('id')->nullable();
			$table->foreign('id_informasi_awal')->references('id')->on('informasi_awal')->onUpdate('cascade')->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::dropIfExists('tim');
	}
}
