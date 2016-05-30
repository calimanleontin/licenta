<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('products_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->foreign('products_id')
				->references('id')
				->on('products')
				->onDelete('cascade');
			$table->foreign('user_id')
				->references('id')
				->on('users')
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
		Schema::drop('products_user');
	}

}
