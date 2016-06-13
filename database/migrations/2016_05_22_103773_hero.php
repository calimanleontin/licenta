<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hero extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hero', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('level')->unsigned()->default(1);
			$table->integer('experience')->unsigned()->default(0);
			$table->integer('busy')->nullable();

			//where is now
			$table->string('location');
			$table->string('name');
			$table->string('sex');
			$table->string('started_at')->nullable();
			$table->string('ended_at')->nullable();
			$table->string('image');
			$table->integer('class_id');
			
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');

			$table->integer('stats_id')->unsigned()->nullable();
			$table->foreign('stats_id')
				->references('id')
				->on('stats')
				->onDelete('cascade');

			$table->integer('intern_places_id')->unsigned()->nullable();
			$table->foreign('intern_places_id')
				->references('id')
				->on('intern_places');

			$table->integer('outside_places_id')->unsigned()->nullable();
			$table->foreign('outside_places_id')
				->references('id')
				->on('outside_places');

			$table->integer('championship_id')->unsigned()->nullable();
			$table->foreign('championship_id')
				->references('id')
				->on('championship');

			$table->integer('works_id')->unsigned()->nullable();
			$table->foreign('works_id')
				->references('id')
				->on('works');

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
		Schema::drop('hero');
	}
}
