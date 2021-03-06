<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use GuzzleHttp;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use App\User;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends Controller {

	public function authenticate(Request $request){
		$credentials = $request->only('username', 'password');
		try{
			if(!$token = JWTAuth::attempt($credentials)){
				return response()->json(['error' => 'invalid_credentials'], 401);
			}
		} catch (JWTException $e){
			return response()->json(['error' => 'could_not_create_token'], 500);
		}

		$res = compact('token');
		if(!\JWTAuth::toUser($token)->approved){
			$res['error'] = 'user_not_approved';
			$code = 403;
		}
		else{
			$code = 200;
		}
		
		return response()->json($res, $code);
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
