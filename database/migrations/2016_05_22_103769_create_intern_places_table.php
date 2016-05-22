<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternPlacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('intern_places', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('level_required')->unsigned()->default(1);
			$table->integer('time_spent')->unsigned();
			$table->integer('experience');
			$table->integer('reward');
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
		Schema::drop('intern_places');
	}

}
