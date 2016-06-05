<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('work', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('time_spent');
			$table->integer('experience');
			$table->date('started_on');
			$table->date('ends_on');
			$table->integer('reward');
			$table->timestamps();
		});

		$work = new \App\Work();
		$work->name = 'Home';
		$work->time_spent = 2;
		$work->started_on = \Carbon\Carbon::now();
		$work->ends_on = \Carbon\Carbon::now()->addHours($work->time_spent);
		$work->experience = 10;
		$work->reward = 500;
		$work->save();

		$work = new \App\Work();
		$work->name = 'Sea';
		$work->time_spent = 8;
		$work->started_on = \Carbon\Carbon::now();
		$work->ends_on = \Carbon\Carbon::now()->addHours($work->time_spent);
		$work->experience = 80;
		$work->reward = 5000;
		$work->save();

		$work = new \App\Work();
		$work->name = 'Jungle';
		$work->time_spent = 12;
		$work->started_on = \Carbon\Carbon::now();
		$work->ends_on = \Carbon\Carbon::now()->addHours($work->time_spent);
		$work->experience = 120;
		$work->reward = 10000;
		$work->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('work');
	}

}
