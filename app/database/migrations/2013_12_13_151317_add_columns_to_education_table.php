<?php

use Illuminate\Database\Migrations\Migration;

class AddColumnsToEducationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table('educations', function($table)
		{
		    $table->string('start_month');
		    $table->string('end_month');
		});
	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}