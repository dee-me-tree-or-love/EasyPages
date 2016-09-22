<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('username', 32)->unique();
			$table->string('email', 255)->unique();
                        $table->rememberToken();
			$table->string('password', 255);
                        $table->string('type', 1);
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}