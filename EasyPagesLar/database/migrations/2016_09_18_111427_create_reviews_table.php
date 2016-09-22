<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReviewsTable extends Migration {

	public function up()
	{
		Schema::create('reviews', function(Blueprint $table) {
			$table->increments('review_id');
			$table->timestamps();
                        $table->string('title', 140);
			$table->string('description', 1024);
			$table->integer('rating');
			$table->integer('profile_id')->unsigned()->nullable();
			$table->integer('service_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('reviews');
	}
}