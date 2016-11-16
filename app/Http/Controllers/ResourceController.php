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
		$loans = \JWTAuth::toUser(\JWTAuth::getToken())->loans;
    	$ret = $loans->toArray();
    	$counter = 0;

    	foreach ($loans as $loan) {
    		$temp = $loan->areaLoanType->loanType->get(['name']);
    		$ret[$counter]["loan_type"] = $temp[0]["name"];
    		$counter++;
    	}

    	return json_encode($ret);

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
