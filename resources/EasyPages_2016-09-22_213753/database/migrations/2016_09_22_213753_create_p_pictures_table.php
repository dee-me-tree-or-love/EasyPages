<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePPicturesTable extends Migration {

	public function up()
	{
		Schema::create('p_pictures', function(Blueprint $table) {
			$table->increments('picture_id');
			$table->timestamps();
			$table->integer('profile_id')->unsigned();
			$table->string('pathsmall', 1024);
			$table->string('pathmed', 1024);
			$table->string('pathlarge', 1024);
		});
	}

	public function down()
	{
		Schema::drop('p_pictures');
	}
}