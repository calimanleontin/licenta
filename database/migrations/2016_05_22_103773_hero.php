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
			$table->integer('experience')->unsigned()->nullable();
			$table->integer('busy')->nullable();
			$table->string('name');
			$table->string('sex');
			$table->string('image');

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
