<?php

use Illuminate\Database\Schema\Blueprint;
use App\User;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->enum('role',['admin','user','moderator',])->default('admin');
            $table->bigInteger('views')->default(0);
            $table->rememberToken();
            $table->string('dictionary');
            $table->string('image');
            $table->bigInteger('money')->unsigned()->default(2000);
            $table->string('reference');
            $table->timestamps();
        });

        $user = new User();
        $user->name = 'admin';
        $user->email = 'calimanleontin@gmail.com';
        $user->password = \Hash::make('admin');
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
