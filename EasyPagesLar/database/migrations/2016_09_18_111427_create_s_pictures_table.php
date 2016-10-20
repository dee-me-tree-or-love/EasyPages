<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


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
		Schema::dropIfExists('s_pictures');
	}
}