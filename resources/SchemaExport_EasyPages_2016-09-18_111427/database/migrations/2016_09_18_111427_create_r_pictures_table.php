<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRPicturesTable extends Migration {

	public function up()
	{
		Schema::create('r_pictures', function(Blueprint $table) {
			$table->increments('picture_id');
			$table->timestamps();
			$table->integer('review_id')->unsigned();
			$table->string('path', 1024);
		});
	}

	public function down()
	{
		Schema::drop('r_pictures');
	}
}