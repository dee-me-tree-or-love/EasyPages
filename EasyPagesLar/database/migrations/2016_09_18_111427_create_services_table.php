<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateServicesTable extends Migration {

	public function up()
	{
		Schema::create('services', function(Blueprint $table) {
			$table->increments('service_id');
                        //$table->primary('service_id');
			$table->timestamps();
			$table->string('title', 255);
			$table->decimal('price');
			$table->string('description', 1024);
            $table->integer('company_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('services');
	}
}