<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTalksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('talks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('message');
            $table->integer('user_id')->unsigned()->index();
			$table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('talks');
	}

}
