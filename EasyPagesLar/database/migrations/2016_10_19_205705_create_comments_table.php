<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function(Blueprint $table) {
			$table->increments('comment_id');
			$table->timestamps();
            $table->integer('review_id')->unsigned();
			$table->integer('user_id')->unsigned();
            // a parent comment id, 
            // all replies on replies have the same thread -> 2 level comment system
            $table->integer('thread_id')->unsigned()->nullable();
			$table->string('text', 512);
            $table->string('author', 56);
            $table->foreign('thread_id')->references('comment_id')->on('comments');
            $table->foreign('review_id')->references('review_id')->on('reviews');
            $table->foreign('user_id')->references('id')->on('users');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
