<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		// return view('welcome');

		// $arr = array ('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5);



    	// return json_encode(\App\Client::find(1));

    	// return \App\Client::find(1)->loans()->first()->areaLoanType->loanType->select(['name'])->get();
	}
}
