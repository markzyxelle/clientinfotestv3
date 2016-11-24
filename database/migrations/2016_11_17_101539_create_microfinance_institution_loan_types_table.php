<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMicrofinanceInstitutionLoanTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('microfinance_institution_loan_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('microfinance_institution_id')->unsigned();
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
		Schema::drop('microfinance_institution_loan_types');
	}

}
