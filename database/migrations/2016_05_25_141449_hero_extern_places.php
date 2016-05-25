<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HeroExternPlaces extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hero_outside_places', function(Blueprint $table) {
			$table->increments('id');

			$table->integer('outside_places_id')->unsigned()->default(0);
			$table->foreign('outside_places_id')
				->references('id')
				->on('outside_places');

			$table->integer('hero_id')->unsigned()->default(0);
			$table->foreign('hero_id')
				->references('id')
				->on('hero');

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
		Schema::drop('hero_outside_places');
	}

}
