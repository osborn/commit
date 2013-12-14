<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersEducationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('education', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedinteger('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('school');
			$table->text('course');
			$table->integer('start_year');
			$table->integer('end_year');
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
		Schema::drop('education');
	}

}
