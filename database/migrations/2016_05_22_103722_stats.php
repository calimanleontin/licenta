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
			$table->integer('strength')->unsigned()->default(1);
			$table->integer('perception')->unsigned()->default(1);
			$table->integer('endurance')->unsigned()->default(1);
			$table->integer('charisma')->unsigned()->default(1);
			$table->integer('intelligence')->unsigned()->default(1);
			$table->integer('luck')->unsigned()->default(1);
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
