<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use \Validator;

class RegisterController extends Controller {
	use RegistersUsers;

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function register(Request $request) {
		$validator = $this->validateRegister($request);

		if ($validator->fails()) {
			return $this->sendValidationResponse($request, $validator);
		}

		event(new Registered($user = $this->create($request->all())));

		$response['token'] = $user->createToken('NemoTK')->accessToken;
		$response['status'] = Response::HTTP_OK;
		return response()->json(
			$response,
			Response::HTTP_OK
		);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function create(array $attributes) {
		$user = new User($attributes);
		$user->save();
		return $user;
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validateRegister(Request $request) {
		return Validator::make($request->all(), [
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);
	}

	protected function sendValidationResponse(Request $request, $validator) {
		$response['message'] = '';

		$errors = $validator->messages();
		foreach ($errors->toArray() as $error) {
			$response['message'] .= $error[0] . ' ';
		}

		$response['status'] = Response::HTTP_BAD_REQUEST;
		return response()->json(
			$response,
			Response::HTTP_BAD_REQUEST
		);
	}
}