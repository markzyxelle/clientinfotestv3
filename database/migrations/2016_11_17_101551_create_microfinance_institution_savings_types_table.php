<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMicrofinanceInstitutionSavingsTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('microfinance_institution_savings_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('microfinance_institution_id')->unsigned();
			// $table->foreign('area_id')->references('id')->on('areas');
			$table->integer('savings_type_id')->unsigned();
			// $table->foreign('savings_type_id')->references('id')->on('savings_types');
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
		Schema::drop('microfinance_institution_savings_types');
	}

}
