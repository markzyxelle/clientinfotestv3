<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAreaLoanTypeToLoansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('loans', function(Blueprint $table)
		{
			$table->integer('area_loan_type_id')->unsigned();
			$table->foreign('area_loan_type_id')->references('id')->on('area_loan_type');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('loans', function(Blueprint $table)
		{
			$table->dropForeign('loans_area_loan_type_id_foreign');
			// $table->dropColumn('area_loan_type_id');
		});
	}

}
