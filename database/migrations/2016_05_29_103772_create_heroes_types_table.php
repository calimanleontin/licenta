<?php

use Illuminate\Database\Schema\Blueprint;
use App\HeroesTypes;
use Illuminate\Database\Migrations\Migration;

class CreateHeroesTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('heroes_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->integer('strength')->unsigned()->default(1);
			$table->integer('perception')->unsigned()->default(1);
			$table->integer('endurance')->unsigned()->default(1);
			$table->integer('charisma')->unsigned()->default(1);
			$table->integer('intelligence')->unsigned()->default(1);
			$table->integer('agility')->unsigned()->default(1);
			$table->integer('luck')->unsigned()->default(1);
			$table->string('image')->nullable();

			$table->integer('author_id')->unsigned()->nullable();
			$table->foreign('author_id')
				->references('id')
				->on('users');
			$table->timestamps();
		});

		$class = new HeroesTypes();

		$class->name = 'ceva';
		$class->strength = 3;
		$class->perception = 3;
		$class->endurance = 3;
		$class->charisma = 3;
		$class->intelligence = 3;
		$class->agility = 3;
		$class->intelligence = 3;
		$class->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('heroes_types');
	}

}
