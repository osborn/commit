<?php

use Illuminate\Database\Migrations\Migration;

class RenameEducationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::rename('education', 'educations');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::rename('educations', 'education');
	}

}