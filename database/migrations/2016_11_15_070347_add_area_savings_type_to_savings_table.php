<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAreaSavingsTypeToSavingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('savings', function(Blueprint $table)
		{
			$table->integer('area_savings_type_id')->unsigned();
			$table->foreign('area_savings_type_id')->references('id')->on('area_savings_type');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('savings', function(Blueprint $table)
		{
			$table->dropForeign('savings_area_savings_type_id_foreign');
			// $table->dropColumn('area_savings_type_id');
		});
	}

}
// 