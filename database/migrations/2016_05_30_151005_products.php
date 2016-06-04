<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned()->default(0);
            $table->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('name')->unique();
            $table->float('price')->default(0);
            $table->string('description');
            $table->string('slug')->unique();
            $table->integer('category_id');
            $table->integer('quantity')->unsigned()->default(0);
            $table->boolean('active')->default(1);
            $table->bigInteger('views')->default(0);
            $table->bigInteger('likes')->default(0);
            $table->bigInteger('dislikes')->default(0);
            $table->bigInteger('noComments')->unsigned()->default(0);
            $table->string('image');

            $table->integer('stats_id')->unsigned()->nullable();
            $table->foreign('stats_id')
                ->references('id')
                ->on('stats')
                ->onDelete('cascade');

            $table->integer('hero_id')->unsigned()->nullable();
            $table->foreign('hero_id')
                ->references('id')
                ->on('hero');
            $table->timestamps();
        });


        Schema::create('categories_products', function(Blueprint $table)
        {
            $table->integer('products_id')->unsigned()->index();
            $table->foreign('products_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->integer('categories_id')->unsigned()->index();
            $table->foreign('categories_id')
                ->references('id')
                ->on('categories')
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
        Schema::drop('categories_products');
        Schema::drop('products');
    }
}
