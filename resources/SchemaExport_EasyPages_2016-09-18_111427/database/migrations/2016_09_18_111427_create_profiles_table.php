<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration {

	public function up()
	{
		Schema::create('profiles', function(Blueprint $table) {
			$table->increments('profile_id');
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->string('fname', 255);
			$table->string('lname', 255);
			$table->date('dob');
			$table->integer('address_id')->nullable();
			$table->string('sex', 1);
		});
	}

	public function down()
	{
		Schema::drop('profiles');
	}
}