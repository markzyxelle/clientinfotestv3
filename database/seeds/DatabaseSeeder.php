<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');

		$clients = array(
			['area_id' => 1,'first_name' => 'Mark', 'last_name' => 'Sicad', 'cc_code' => 'abcd', 'username' => 'mark', 'email' => 'mark@gmail.com', 'password' => Hash::make('qweasd'), 'approved' => false],
		);

		\App\MicrofinanceInstitution::create(['name' => 'CENTECH corp.']);
		\App\Area::create(['microfinance_institution_id' => 1, 'name' => 'area 1']);

		foreach ($clients as $client) {
			\App\Client::create($client);
		}

		\App\LoanType::create(['name' => 'Loan Type 1']);
		\App\SavingsType::create(['name' => 'Savings Type 1']);
		\App\AreaLoanType::create(['area_id' => 1, 'loan_type_id' => 1]);
		\App\AreaSavingsType::create(['area_id' => 1, 'savings_type_id' => 1]);
		\App\Loan::create(['client_id' => 1, 'amount' => 30000, 'cc_code' => '1234', 'area_loan_type_id' => 1]);
		\App\Saving::create(['client_id' => 1, 'amount' => 30000, 'cc_code' => '5678', 'area_savings_type_id' => 1]);
	}

}
