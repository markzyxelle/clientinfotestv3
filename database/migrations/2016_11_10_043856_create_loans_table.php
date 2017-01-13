<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('loans', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->bigInteger('client_id')->unsigned();
			// $table->foreign('client_id')->references('id')->on('clients');
			$table->float('principal_amount', 8, 2);
			$table->float('interest_amount', 8, 2);
			$table->float('principal_paid', 8, 2);
			$table->float('interest_paid', 8, 2);
			$table->integer('cycle_number')->unsigned();
			$table->float('principal_arrears', 8, 2);
			$table->float('interest_arrears', 8, 2);
			$table->date('start_payment_date');
			$table->date('maturity_date');
			$table->integer('amortization_left')->unsigned();
			$table->string('payment_frequency');
			
			//for dues
			$table->date('due_date');
			$table->float('due_principal_amount', 8, 2);
			$table->float('due_interest_amount', 8, 2);
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
		Schema::drop('loans');
	}

}
