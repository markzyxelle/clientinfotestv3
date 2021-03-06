<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->integer('area_id')->unsigned();
			// $table->foreign('area_id')->references('id')->on('areas');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('cc_code');
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->boolean('approved');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients');
	}

}