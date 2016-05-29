<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatCostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stats_costs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('strength_cost')->unsigned()->default(10);
			$table->integer('perception_cost')->unsigned()->default(10);
			$table->integer('endurance_cost')->unsigned()->default(10);
			$table->integer('charisma_cost')->unsigned()->default(10);
			$table->integer('intelligence_cost')->unsigned()->default(10);
			$table->integer('luck_cost')->unsigned()->default(10);
			$table->integer('level');
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
		Schema::drop('stats_costs');
	}

}
