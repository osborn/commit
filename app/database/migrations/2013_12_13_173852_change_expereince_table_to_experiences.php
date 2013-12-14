<?php

use Illuminate\Database\Migrations\Migration;

class ChangeExpereinceTableToExperiences extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::rename('experience', 'experiences');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::rename('experiences', 'experience');
	}

}