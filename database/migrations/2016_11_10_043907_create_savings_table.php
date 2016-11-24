<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('savings', function(Blueprint $table)		//can put into 1 table with loans
		{
			$table->bigIncrements('id');
			$table->bigInteger('client_id')->unsigned();
			// $table->foreign('client_id')->references('id')->on('clients');
			$table->float('amount', 8, 2);
			$table->date('cutoff_date');
			$table->string('cc_code');
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
		Schema::drop('savings');
	}

}
