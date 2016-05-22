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
			$table->string('name');
			$table->tinyInteger('sex');
			$table->integer('user_id')->unsigned()->default(0);
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
			$table->integer('stats_id')->unsigned()->default(0);
			$table->foreign('stats_id')
				->references('id')
				->on('stats')
				->onDelete('cascade');
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
