<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSprintTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sprint', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sprint_number');
			$table->string('description');
			$table->date('start_date');
			$table->date('end_date');
			$table->integer('total_points');
			$table->softDeletes();		
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
		Schema::dropIfExists('sprint');
	}

}
