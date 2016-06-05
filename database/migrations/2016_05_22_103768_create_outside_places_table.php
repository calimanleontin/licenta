<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutsidePlacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('outside_places', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('level_required')->unsigned()->default(1);
			$table->integer('time_spent')->unsigned();
			$table->integer('experience');
			$table->integer('reward');
			$table->date('started_on');
			$table->date('ends_on');
			$table->timestamps();
		});

		$outside = new \App\ExternalPlaces();
		$outside->name = 'Forrest';
		$outside->level_required = 10;
		$outside->time_spent = 2;
		$outside->started_on = \Carbon\Carbon::now();
		$outside->ends_on = \Carbon\Carbon::now()->addHours($outside->time_spent);
		$outside->experience = 80;
		$outside->reward = 100;
		$outside->save();


		$outside = new \App\ExternalPlaces();
		$outside->name = 'Sea';
		$outside->level_required = 20;
		$outside->time_spent = 7;
		$outside->experience = 200;
		$outside->reward = 1000;
		$outside->started_on = \Carbon\Carbon::now();
		$outside->ends_on = \Carbon\Carbon::now()->addHours($outside->time_spent);
		$outside->save();


		$outside = new \App\ExternalPlaces();
		$outside->name = 'Mountain';
		$outside->level_required = 30;
		$outside->time_spent = 20;
		$outside->experience = 800;
		$outside->started_on = \Carbon\Carbon::now();
		$outside->ends_on = \Carbon\Carbon::now()->addHours($outside->time_spent);
		$outside->reward = 2000;
		$outside->save();


		$outside = new \App\ExternalPlaces();
		$outside->name = 'Volcano';
		$outside->level_required = 40;
		$outside->time_spent = 30;
		$outside->experience = 1600;
		$outside->started_on = \Carbon\Carbon::now();
		$outside->ends_on = \Carbon\Carbon::now()->addHours($outside->time_spent);
		$outside->reward = 5000;
		$outside->save();


		$outside = new \App\ExternalPlaces();
		$outside->name = 'Hell';
		$outside->level_required = 50;
		$outside->time_spent = 48;
		$outside->experience = 8000;
		$outside->started_on = \Carbon\Carbon::now();
		$outside->ends_on = \Carbon\Carbon::now()->addHours($outside->time_spent);
		$outside->reward = 11000;
		$outside->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('outside_places');
	}

}
