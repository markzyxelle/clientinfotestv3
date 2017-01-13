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
			['area_id' => 1,'first_name' => 'Carlo', 'last_name' => 'Sicad', 'cc_code' => 'efgh', 'username' => 'carlo', 'email' => 'carlo@gmail.com', 'password' => Hash::make('qweasd'), 'approved' => false],
			['area_id' => 1,'first_name' => 'Malou', 'last_name' => 'Sicad', 'cc_code' => 'ijkl', 'username' => 'malou', 'email' => 'malou@gmail.com', 'password' => Hash::make('qweasd'), 'approved' => false],
		);

		\App\MicrofinanceInstitution::create(['name' => 'CENTECH corp.']);
		\App\Area::create(['microfinance_institution_id' => 1, 'name' => 'area 1']);

		foreach ($clients as $client) {
			\App\Client::create($client);
		}

		\App\LoanType::create(['name' => 'Grameen Loan']);
		\App\LoanType::create(['name' => 'Negosyo Loan']);
		\App\LoanType::create(['name' => 'House Loan']);
		\App\SavingsType::create(['name' => 'Capital Buildup']);
		\App\SavingsType::create(['name' => 'Withdrawable Savings']);
		\App\MicrofinanceInstitutionLoanType::create(['microfinance_institution_id' => 1, 'loan_type_id' => 1]);
		\App\MicrofinanceInstitutionLoanType::create(['microfinance_institution_id' => 1, 'loan_type_id' => 2]);
		\App\MicrofinanceInstitutionLoanType::create(['microfinance_institution_id' => 1, 'loan_type_id' => 3]);
		\App\MicrofinanceInstitutionSavingsType::create(['microfinance_institution_id' => 1, 'savings_type_id' => 1]);
		\App\MicrofinanceInstitutionSavingsType::create(['microfinance_institution_id' => 1, 'savings_type_id' => 2]);
		$date = DateTime::createFromFormat('d-m-Y', "01-12-2016");
		$usableDate = $date->format('Y-m-d');
		$loan = \App\Loan::create(['client_id' => 1, 'principal_amount' => 30000, 'interest_amount' => 30000, 'principal_paid' => 30000, 'interest_paid' => 30000, 'cycle_number' => 1, 'principal_arrears' => 30000, 'interest_arrears' => 30000, 'due_date' => $usableDate, 'due_principal_amount' => 30000, 'due_interest_amount' => 30000, 'cutoff_date' =>  $usableDate, 'cc_code' => '1234', 'microfinance_institution_loan_type_id' => 1, 'start_payment_date' => $usableDate, 'maturity_date' => $usableDate, 'amortization_left' => 5, 'payment_frequency' => 'weekly']);
		$loan->microfinanceInstitutionSavingsType()->attach(1, ['due_amount' => 100]);
		$loan->microfinanceInstitutionSavingsType()->attach(2, ['due_amount' => 500]);
		\App\Loan::create(['client_id' => 1, 'principal_amount' => 15000, 'interest_amount' => 15000, 'principal_paid' => 15000, 'interest_paid' => 15000, 'cycle_number' => 2, 'principal_arrears' => 15000, 'interest_arrears' => 15000, 'due_date' => $usableDate, 'due_principal_amount' => 15000, 'due_interest_amount' => 15000, 'cutoff_date' =>  $usableDate, 'cc_code' => 'abcd', 'microfinance_institution_loan_type_id' => 2, 'start_payment_date' => $usableDate, 'maturity_date' => $usableDate, 'amortization_left' => 5, 'payment_frequency' => 'weekly']);
		\App\Loan::create(['client_id' => 2, 'principal_amount' => 20000, 'interest_amount' => 200, 'principal_paid' => 1000, 'interest_paid' => 100, 'cycle_number' => 3, 'principal_arrears' => 700, 'interest_arrears' => 100, 'due_date' => $usableDate, 'due_principal_amount' => 100, 'due_interest_amount' => 20, 'cutoff_date' =>  $usableDate, 'cc_code' => '1234', 'microfinance_institution_loan_type_id' => 1, 'start_payment_date' => $usableDate, 'maturity_date' => $usableDate, 'amortization_left' => 5, 'payment_frequency' => 'weekly']);
		\App\Loan::create(['client_id' => 2, 'principal_amount' => 35000, 'interest_amount' => 350, 'principal_paid' => 500, 'interest_paid' => 50, 'cycle_number' => 2, 'principal_arrears' => 600, 'interest_arrears' => 50, 'due_date' => $usableDate, 'due_principal_amount' => 50, 'due_interest_amount' => 10, 'cutoff_date' =>  $usableDate, 'cc_code' => 'abcd', 'microfinance_institution_loan_type_id' => 3, 'start_payment_date' => $usableDate, 'maturity_date' => $usableDate, 'amortization_left' => 5, 'payment_frequency' => 'weekly']);
		\App\Loan::create(['client_id' => 3, 'principal_amount' => 30000, 'interest_amount' => 15000, 'principal_paid' => 15000, 'interest_paid' => 150, 'cycle_number' => 1, 'principal_arrears' => 300, 'interest_arrears' => 100, 'due_date' => $usableDate, 'due_principal_amount' => 700, 'due_interest_amount' => 50, 'cutoff_date' =>  $usableDate, 'cc_code' => '1234', 'microfinance_institution_loan_type_id' => 1, 'start_payment_date' => $usableDate, 'maturity_date' => $usableDate, 'amortization_left' => 5, 'payment_frequency' => 'weekly']);
		\App\Loan::create(['client_id' => 3, 'principal_amount' => 15000, 'interest_amount' => 7000, 'principal_paid' => 2000, 'interest_paid' => 100, 'cycle_number' => 3, 'principal_arrears' => 0, 'interest_arrears' => 0, 'due_date' => $usableDate, 'due_principal_amount' => 100, 'due_interest_amount' => 30, 'cutoff_date' =>  $usableDate, 'cc_code' => 'abcd', 'microfinance_institution_loan_type_id' => 2, 'start_payment_date' => $usableDate, 'maturity_date' => $usableDate, 'amortization_left' => 5, 'payment_frequency' => 'weekly']);
		\App\Loan::create(['client_id' => 3, 'principal_amount' => 30000, 'interest_amount' => 10000, 'principal_paid' => 1000, 'interest_paid' => 100, 'cycle_number' => 7, 'principal_arrears' => 0, 'interest_arrears' => 0, 'due_date' => $usableDate, 'due_principal_amount' => 100, 'due_interest_amount' => 40, 'cutoff_date' =>  $usableDate, 'cc_code' => '1234', 'microfinance_institution_loan_type_id' => 3, 'start_payment_date' => $usableDate, 'maturity_date' => $usableDate, 'amortization_left' => 5, 'payment_frequency' => 'weekly']);
		\App\Saving::create(['client_id' => 1, 'amount' => 30000, 'cc_code' => '5678', 'cutoff_date' =>  $usableDate, 'microfinance_institution_savings_type_id' => 1]);

	}

}
