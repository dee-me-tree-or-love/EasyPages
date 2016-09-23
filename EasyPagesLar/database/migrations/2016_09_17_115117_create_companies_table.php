<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

	public function up()
	{
		Schema::create('companies', function(Blueprint $table) {
			$table->increments('company_id');
			$table->timestamps();
			$table->integer('user_id')->unsigned()->nullable();
			$table->string('name', 250);
			$table->string('website', 250);
			$table->string('description', 512);
		});
	}

	public function down()
	{
		Schema::drop('companies');
	}
}