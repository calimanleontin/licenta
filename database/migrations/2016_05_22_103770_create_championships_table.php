<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChampionshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('championship', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('reward');
			$table->integer('level_required')->unsigned()->default(1);
			$table->string('round_one');
			$table->string('round_two');
			$table->string('round_three');
			$table->string('round_four');
			$table->integer('round');
			//if it begun
			$table->integer('started');

			//if it is finished or not
			$table->integer('active');


			// how much cost to sign in
			$table->integer('ticket');

			$table->date('start_date');
			$table->string('image');

			//max experiente the first place gets
			$table->integer('max_experience')->unsigned();
			$table->integer('max_places')->unsigned();
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
		Schema::drop('championship');
	}

}
