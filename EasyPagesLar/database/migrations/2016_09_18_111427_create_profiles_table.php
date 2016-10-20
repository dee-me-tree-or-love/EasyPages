<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


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
		Schema::dropIfExists('profiles');
	}
}