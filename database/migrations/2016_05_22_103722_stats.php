<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Stats extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stats', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('final_strength')->unsigned()->default(0);
			$table->integer('final_perception')->unsigned()->default(0);
			$table->integer('final_endurance')->unsigned()->default(0);
			$table->integer('final_charisma')->unsigned()->default(0);
			$table->integer('final_intelligence')->unsigned()->default(0);
			$table->integer('final_agility')->unsigned()->default(0);
			$table->integer('final_luck')->unsigned()->default(0);
			$table->integer('strength')->unsigned()->default(0);
			$table->integer('perception')->unsigned()->default(0);
			$table->integer('endurance')->unsigned()->default(0);
			$table->integer('charisma')->unsigned()->default(0);
			$table->integer('intelligence')->unsigned()->default(0);
			$table->integer('agility')->unsigned()->default(0);
			$table->integer('luck')->unsigned()->default(0);
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
		Schema::drop('stats');
	}

}
