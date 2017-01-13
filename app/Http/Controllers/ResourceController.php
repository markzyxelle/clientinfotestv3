<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResourceController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('isJWT');
		$this->middleware('jwt.auth');
		$this->middleware('isApproved', ['except' => ['changePassword']]);
	}

	/**
	 * Change Password.
	 *
	 * @return Response
	 */
	public function changePassword(Request $request)
	{
		$credentials = $request->only('password');
		$user = \JWTAuth::toUser(\JWTAuth::getToken());

		$user->password = Hash::make($credentials["password"]);
		$user->approved = true;
		$user->save();

    	return response()->json(200);
	}

	/**
	 * Display data for Dashboard.
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		$user = \JWTAuth::toUser(\JWTAuth::getToken());

    	return $user->username;
	}

	/**
	 * Display data for Loans. (improve) ----------------======================----------------------------
	 *
	 * @return Response
	 */
	public function loans()
	{
		// $client = \App\Client::find(1);
		$client = \JWTAuth::toUser(\JWTAuth::getToken());
		$loans = $client->load([
	  	'loans' => function($query){
	  		$query->get(['id', 'client_id', 'microfinance_institution_loan_type_id', 'principal_amount', 'interest_amount', 'principal_paid', 'interest_paid', 'cycle_number', 'cutoff_date', 'start_payment_date', 'maturity_date', 'amortization_left', 'payment_frequency']);
	  	},
	  	'loans.microfinanceinstitutionloantype' => function($query){
	  		$query->get(['id','loan_type_id']);
	  	},
	  	'loans.microfinanceinstitutionloantype.loantype' => function($query){
	  		$query->get(['id','name']);
	  	}]);

	  	$loans = $loans->toArray();
	  	$loans = $loans["loans"];

	  	$counter = 0;
	  	foreach ($loans as $loan) {
	  		$loans[$counter]["loan_type"] = $loan["microfinanceinstitutionloantype"]["loantype"]["name"];
	  		unset($loans[$counter]["microfinanceinstitutionloantype"]);
	  		unset($loans[$counter]["id"]);
	  		unset($loans[$counter]["client_id"]);
	  		unset($loans[$counter]["microfinance_institution_loan_type_id"]);
	  		$counter++;
	  	}

	  	return json_encode($loans);

	  	//remove
	  			// $loans = \App\Client::find(1)->loans;
		// // $loans = \JWTAuth::toUser(\JWTAuth::getToken())->loans;
  //   	$ret = $loans->toArray();
  //   	$counter = 0;

  //   	foreach ($loans as $loan) {
  //   		$temp = $loan->microfinanceInstitutionLoanType->loanType->get(['name']);
  //   		$ret[$counter]["loan_type"] = $temp[0]["name"];
  //   		$counter++;
  //   	}

  //   	return json_encode($ret);

		//working (not efficient)
	  	// $loans = \App\Client::find(1)->loans;
	  	// $details = $loans->load(

	  	// [
	  	// 'microfinanceinstitutionloantype' => function($query)
	  	// {
	  	// 	$query->get(['id','loan_type_id']);
	  	// }
	  	// ,
	  	// 'microfinanceinstitutionloantype.loantype' => function($query)
	  	// {
	  	// 	$query->get(['id','name']);
	  	// }
	  	// ]



	  	// );
	  	// $details = $details->toArray();
	  	// $counter = 0;
	  	// foreach ($details as $detail) {
	  	// 	$details[$counter]["loan_type"] = $detail["microfinanceinstitutionloantype"]["loantype"]["name"];
	  	// 	unset($details[$counter]["microfinanceinstitutionloantype"]);
	  	// 	// $details[$counter]["loan_type"] = "dfsdfsdf";
	  	// 	$counter++;
	  	// }
	  	// // $temp["loantype"] = "sfsdfsf";
	  	// return $details;
	  	// // return $loans->load('microfinanceinstitutionloantype.loantype');




	}

	/**
	 * Display data for Savings. (improve) ----------------======================----------------------------
	 *
	 * @return Response
	 */
	public function savings()
	{
		// $client = \App\Client::find(1);
		$client = \JWTAuth::toUser(\JWTAuth::getToken());
	  	$savings = $client->load([
	  	'savings' => function($query){
	  		$query->get(['id', 'client_id', 'microfinance_institution_savings_type_id', 'amount', 'cutoff_date']);
	  	},
	  	'savings.microfinanceinstitutionsavingstype' => function($query){
	  		$query->get(['id','savings_type_id']);
	  	},
	  	'savings.microfinanceinstitutionsavingstype.savingstype' => function($query){
	  		$query->get(['id','name']);
	  	}]);

	  	$savings = $savings->toArray();
	  	$savings = $savings["savings"];
	  	// return $savings["microfinanceinstitutionsavingstype"];

	  	$counter = 0;
	  	foreach ($savings as $saving) {
	  		$savings[$counter]["savings_type"] = $saving["microfinanceinstitutionsavingstype"]["savingstype"]["name"];
	  		unset($savings[$counter]["microfinanceinstitutionsavingstype"]);
	  		unset($savings[$counter]["id"]);
	  		unset($savings[$counter]["client_id"]);
	  		unset($savings[$counter]["microfinance_institution_loan_type_id"]);
	  		$counter++;
	  	}

	  	return json_encode($savings);
	}

	/**
	 * Display data for Dues. (improve) ----------------======================----------------------------
	 *
	 * @return Response
	 */
	public function dues()
	{
		// $client = \App\Client::find(1);
		$client = \JWTAuth::toUser(\JWTAuth::getToken());
		$loans = $client->load([
	  	'loans' => function($query){
	  		$query->get(['id', 'client_id', 'microfinance_institution_loan_type_id', 'principal_arrears', 'interest_arrears', 'due_date', 'due_principal_amount', 'due_interest_amount', 'cycle_number', 'cutoff_date']);
	  	},
	  	'loans.microfinanceinstitutionloantype' => function($query){
	  		$query->get(['id','loan_type_id']);
	  	},
	  	'loans.microfinanceinstitutionloantype.loantype' => function($query){
	  		$query->get(['id','name']);
	  	},
	  	'loans.microfinanceinstitutionsavingstype' => function($query){
	  		$query->get(['id','savings_type_id']);
	  		$query->withPivot('due_amount');
	  	},
	  	'loans.microfinanceinstitutionsavingstype.savingstype' => function($query){
	  		$query->get(['id', 'name']);
	  	}]);

	  	$loans = $loans->toArray();
	  	$loans = $loans["loans"];

	  	$counter = 0;
	  	foreach ($loans as $loan) {
	  		$loans[$counter]["loan_type"] = $loan["microfinanceinstitutionloantype"]["loantype"]["name"];
	  		// $loans[$counter]["savings_type"] = $loan["microfinanceinstitutionsavingstype"]["savingstype"];
	  		// $savings_counter = 0;
	  		foreach($loan["microfinanceinstitutionsavingstype"] as $saving){
	  			$loans[$counter]["savings"][$saving["savingstype"]["name"]] = $saving["pivot"]["due_amount"];
	  		}
	  		unset($loans[$counter]["microfinanceinstitutionsavingstype"]);
	  		unset($loans[$counter]["microfinanceinstitutionloantype"]);
	  		unset($loans[$counter]["id"]);
	  		unset($loans[$counter]["client_id"]);
	  		unset($loans[$counter]["microfinance_institution_loan_type_id"]);
	  		$counter++;
	  	}

	  	return json_encode($loans);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
