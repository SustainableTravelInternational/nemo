<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

	public $successStatus = 200;

	/**
	 * login api
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function login() {
		$this->validateLogin();

		if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
			$user = Auth::user();
			$success['token'] = $user->createToken('NemoTK')->accessToken;
			return response()->json(['success' => $success], $this->successStatus);
		} else {
			return response()->json(['error' => 'Unauthorised'], 401);
		}
	}

	/**
	 * Validate the user login request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return void
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	protected function validateLogin() {
		request()->validate([
			'email' => 'required|string',
			'password' => 'required|string',
		]);
	}

	/**
	 * Register api
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function register(Request $request) {
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required',
			'c_password' => 'required|same:password',
		]);
		if ($validator->fails()) {
			return response()->json(['error' => $validator->errors()], 401);
		}
		$input = $request->all();
		$input['password'] = bcrypt($input['password']);
		$user = User::create($input);
		$success['token'] = $user->createToken('MyApp')->accessToken;
		$success['name'] = $user->name;
		return response()->json(['success' => $success], $this->successStatus);
	}

	/**
	 * details api
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function details() {
		$user = Auth::user();
		return response()->json(['success' => $user], $this->successStatus);
	}

}
