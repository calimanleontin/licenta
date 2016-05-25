<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HeroChampionship extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hero_championship', function(Blueprint $table) {
			$table->increments('id');

			$table->integer('championship_id')->unsigned()->default(0);
			$table->foreign('championship_id')
				->references('id')
				->on('championship');

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
		Schema::drop('hero_championship');
	}

}
