<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanMicrofinanceInstitutionSavingsTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('loan_microfinance_institution_savings_type', function(Blueprint $table)
		{
			$table->bigInteger('loan_id')->unsigned();
			// $table->foreign('loan_id')->references('id')->on('loans');
			$table->integer('microfinance_institution_savings_type_id')->unsigned();
			// $table->foreign('savings_type_id')->references('id')->on('savings_types');
			$table->float('due_amount', 8, 2);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('loan_microfinance_institution_savings_type');
	}

}
