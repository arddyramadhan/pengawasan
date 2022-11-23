<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoFileStatusToTimTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tim', function (Blueprint $table) {
			$table->string('st_ketua', 150)->nullable()->after('upload_ba');
			$table->text('file_st_ketua')->nullable()->after('st_ketua');
			$table->string('st_sekretaris', 150)->nullable()->after('file_st_ketua');
			$table->text('file_st_sekretaris')->nullable()->after('st_sekretaris');
			$table->enum('status', ['penelusuran', 'pengawasan'])->default('penelusuran')->after('file_st_sekretaris');
			$table->date('mulai')->after('status')->nullable();
			$table->date('selesai')->after('mulai')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tim', function (Blueprint $table) {
			$table->dropColumn('st_ketua');
			$table->dropColumn('file_st_ketua');
			$table->dropColumn('st_sekretaris');
			$table->dropColumn('file_st_sekretaris');
			$table->dropColumn('status');
			$table->dropColumn('mulai');
			$table->dropColumn('selesai');
		});
	}
}
