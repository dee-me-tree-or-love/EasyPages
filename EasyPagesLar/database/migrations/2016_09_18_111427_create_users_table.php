<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('username', 32)->unique();
			$table->string('email', 255)->unique();
<<<<<<< HEAD
			$table->string('password', 255);
            $table->rememberToken();
=======
                        $table->rememberToken();
			$table->string('password', 255);
>>>>>>> development
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}