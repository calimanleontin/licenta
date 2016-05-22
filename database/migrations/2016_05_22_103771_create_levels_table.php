<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('levels', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('number')->unsigned();
			$table->bigInteger('max_experience')->unsigned();
			$table->timestamps();
		});
		for($i=1; $i<=99; $i++)
		{
			$level = new \App\Levels();
			$level->number = $i;
			$level->max_experience = $i*1000 + rand($i*10, $i*100);
			$level->save();
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('levels');
	}

}
