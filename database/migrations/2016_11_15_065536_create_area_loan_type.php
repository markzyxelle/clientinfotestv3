<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaLoanType extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('area_loan_type', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('area_id')->unsigned();
			// $table->foreign('area_id')->references('id')->on('areas');
			$table->integer('loan_type_id')->unsigned();
			// $table->foreign('loan_type_id')->references('id')->on('loan_types');
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
		Schema::drop('area_loan_type');
	}

}
