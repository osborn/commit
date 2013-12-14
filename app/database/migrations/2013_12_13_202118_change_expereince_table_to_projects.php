<?php

use Illuminate\Database\Migrations\Migration;

class ChangeExpereinceTableToProjects extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::rename('experiences', 'projects');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::rename('projects', 'experiences');
	}

}