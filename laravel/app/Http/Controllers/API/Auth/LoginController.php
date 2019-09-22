<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use \Validator;

class LoginController extends Controller {
	use AuthenticatesUsers;

	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function login(Request $request) {
		$validator = $this->validateLogin($request);

		if ($validator->fails()) {
			return $this->sendValidationResponse($request, $validator);
		}

		// If the class is using the ThrottlesLogins trait, we can automatically throttle
		// the login attempts for this application. We'll key this by the username and
		// the IP address of the client making these requests into this application.
		if (method_exists($this, 'hasTooManyLoginAttempts') &&
			$this->hasTooManyLoginAttempts($request)) {
			$this->fireLockoutEvent($request);

			return $this->sendLockoutResponse($request);
		}

		if ($this->attemptLogin($request)) {
			return $this->sendLoginResponse($request);
		}

		// If the login attempt was unsuccessful we will increment the number of attempts
		// to login and redirect the user back to the login form. Of course, when this
		// user surpasses their maximum number of attempts they will get locked out.
		$this->incrementLoginAttempts($request);

		return $this->sendFailedLoginResponse($request);
	}

	/**
	 * Validate the user login request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return void
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	protected function validateLogin(Request $request) {
		return Validator::make($request->all(), [
			'email' => 'required|string',
			'password' => 'required|string',
		]);
	}

	/**
	 * Send the response after the user was authenticated.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	protected function sendLoginResponse(Request $request) {
		$this->clearLoginAttempts($request);

		$user = Auth::user();
		$response['token'] = $user->createToken('NemoTK')->accessToken;
		$response['status'] = Response::HTTP_OK;
		return response()->json(
			$response,
			Response::HTTP_OK
		);
	}

	/**
	 * Get the failed login response instance.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	protected function sendFailedLoginResponse(Request $request) {
		$response['message'] = trans('auth.failed');
		$response['status'] = Response::HTTP_UNAUTHORIZED;
		return response()->json(
			$response,
			Response::HTTP_UNAUTHORIZED
		);
	}

	/**
	 * Redirect the user after determining they are locked out.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return void
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	protected function sendLockoutResponse(Request $request) {
		$seconds = $this->limiter()->availableIn(
			$this->throttleKey($request)
		);

		$response['message'] = trans('auth.throttle', ['seconds' => $seconds]);
		$response['status'] = Response::HTTP_TOO_MANY_REQUESTS;
		return response()->json(
			$response,
			Response::HTTP_TOO_MANY_REQUESTS
		);
	}

	protected function sendValidationResponse(Request $request, $validator) {
		$response['message'] = $validator->messages();
		$response['status'] = Response::HTTP_BAD_REQUEST;
		return response()->json(
			$response,
			Response::HTTP_BAD_REQUEST
		);
	}
}