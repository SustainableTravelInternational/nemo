<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller {
	/**
	 * details api
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function details() {
		$user = auth()->user();

		$response['user'] = $user;
		$response['status'] = Response::HTTP_OK;
		return response()->json(
			$response,
			Response::HTTP_OK
		);
	}
}
