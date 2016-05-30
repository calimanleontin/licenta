<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsLikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_likes', function(Blueprint $table){
			$table->increments('id');
			$table->integer('product_id')->unsigned()->default(0);
			$table->foreign('product_id')
				->references('id')
				->on('products')
				->onDelete('cascade');
			$table->integer('user_id')->unsigned()->default(0);
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
			$table->bigInteger('likes')->default(0);
			$table->bigInteger('dislikes')->default(0);
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
		Schema::drop('product_likes');
	}

}
