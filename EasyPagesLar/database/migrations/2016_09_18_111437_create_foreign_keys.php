<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('profiles', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('reviews', function(Blueprint $table) {
			$table->foreign('profile_id')->references('profile_id')->on('profiles')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('reviews', function(Blueprint $table) {
			$table->foreign('service_id')->references('review_id')->on('reviews')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('r_pictures', function(Blueprint $table) {
			$table->foreign('review_id')->references('review_id')->on('reviews')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('s_pictures', function(Blueprint $table) {
			$table->foreign('service_id')->references('service_id')->on('services')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('p_pictures', function(Blueprint $table) {
			$table->foreign('profile_id')->references('profile_id')->on('profiles')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
        Schema::table('services', function(Blueprint $table) {
			$table->foreign('company_id')->references('company_id')->on('companies')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('profiles', function(Blueprint $table) {
			$table->dropForeign('profiles_user_id_foreign');
		});
		Schema::table('reviews', function(Blueprint $table) {
			$table->dropForeign('reviews_profile_id_foreign');
		});
		Schema::table('reviews', function(Blueprint $table) {
			$table->dropForeign('reviews_service_id_foreign');
		});
		Schema::table('r_pictures', function(Blueprint $table) {
			$table->dropForeign('r_pictures_review_id_foreign');
		});
		Schema::table('s_pictures', function(Blueprint $table) {
			$table->dropForeign('s_pictures_service_id_foreign');
		});
		Schema::table('p_pictures', function(Blueprint $table) {
			$table->dropForeign('p_pictures_profile_id_foreign');
		});
        Schema::table('services', function(Blueprint $table) {
			$table->dropForeign('services_company_id_foreign');
		});
	}
}