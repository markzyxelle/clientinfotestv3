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
			['first_name' => 'Mark', 'last_name' => 'Sicad', 'cc_code' => 'abcd', 'username' => 'mark', 'email' => 'mark@gmail.com', 'password' => Hash::make('qweasd')],
		);

		foreach ($clients as $client) {
			\App\Client::create($client);
		}
	}

}
