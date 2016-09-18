<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSPicturesTable extends Migration {

	public function up()
	{
		Schema::create('s_pictures', function(Blueprint $table) {
			$table->increments('picture_id');
			$table->timestamps();
			$table->integer('service_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('s_pictures');
	}
}