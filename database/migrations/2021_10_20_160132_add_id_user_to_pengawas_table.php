<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdUserToPengawasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function (Blueprint $table) {
			// $table->string('name')->after('id');
			// $table->bigInteger('id_user')->unsigned()->after('name');
			// $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->bigInteger('id_jabatan')->unsigned()->after('name')->nullable();
			$table->foreign('id_jabatan')->references('id')->on('jabatan')->onDelete('cascade')->onUpdate('cascade');
		
		});
	}

	
	public function down()
	{
		Schema::table('users', function (Blueprint $table) {
			// $table->dropColumn('name');
			$table->dropForeign('users_id_jabatan_foreign');
			$table->dropColumn('id_jabatan');
		});
	}
}
