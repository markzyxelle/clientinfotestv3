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
		\App\MicrofinanceInstitutionLoanType::create(['microfinance_institution_id' => 1, 'loan_type_id' => 1]);
		\App\MicrofinanceInstitutionSavingsType::create(['microfinance_institution_id' => 1, 'savings_type_id' => 1]);
		\App\Loan::create(['client_id' => 1, 'principal_amount' => 30000, 'interest_amount' => 30000, 'principal_paid' => 30000, 'interest_paid' => 30000, 'cycle_number' => 1, 'principal_arrears' => 30000, 'interest_arrears' => 30000, 'due_date' => strtotime("01/01/2017"), 'due_principal_amount' => 30000, 'due_interest_amount' => 30000, 'cutoff_date' =>  strtotime("01/01/2017"), 'cc_code' => '1234', 'microfinance_institution_loan_type_id' => 1]);
		\App\Loan::create(['client_id' => 1, 'principal_amount' => 15000, 'interest_amount' => 15000, 'principal_paid' => 15000, 'interest_paid' => 15000, 'cycle_number' => 2, 'principal_arrears' => 15000, 'interest_arrears' => 15000, 'due_date' => strtotime("01/01/2017"), 'due_principal_amount' => 15000, 'due_interest_amount' => 15000, 'cutoff_date' =>  strtotime("01/01/2017"), 'cc_code' => 'abcd', 'microfinance_institution_loan_type_id' => 1]);
		\App\Saving::create(['client_id' => 1, 'amount' => 30000, 'cc_code' => '5678', 'microfinance_institution_savings_type_id' => 1]);
	}

}
