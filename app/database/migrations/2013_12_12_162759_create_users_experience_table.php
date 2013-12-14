<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersExperienceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('experience', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedinteger('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('company');
			$table->string('role');
			$table->text('description');
			$table->date('start_date');
			$table->date('end_date');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('experience');
	}

}
