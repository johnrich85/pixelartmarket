<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\RestController;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;

class AuthController extends Controller {

	use RestController;

	/**
	 * Authenticates a user via username/password.
	 * Returns JWT Token.
	 *
	 * @requestType POST
	 * @route /
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function authenticate(Request $request)
	{
		$credentials = $request->only('email', 'password');

		try {
			if (!$token = JWTAuth::attempt($credentials)) {
				return $this->unauthorizedResponse(['error' => 'invalid_credentials']);
			}
		} catch (JWTException $e) {
			return response()->json(['error' => 'could_not_create_token'], 500);
		}

		return $this->showResponse(compact('token'));
	}
}
