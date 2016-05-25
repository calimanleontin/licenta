<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HeroInternPlaces extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hero_intern_places', function(Blueprint $table) {
			$table->increments('id');

			$table->integer('hero_id')->unsigned()->default(0);
			$table->foreign('hero_id')
				->references('id')
				->on('hero');

			$table->integer('intern_places_id')->unsigned()->default(0);
			$table->foreign('intern_places_id')
				->references('id')
				->on('intern_places');
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
		Schema::drop('hero_intern_places');
	}

}
