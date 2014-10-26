<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddGroupidToTalksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('talks', function(Blueprint $table)
		{
			$table->integer('group_id')->nullable()->after('user_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('talks', function(Blueprint $table)
		{
			$table->dropColumn('group_id');
		});
	}

}
