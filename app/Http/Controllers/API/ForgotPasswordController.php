<?php

namespace App\Http\Controllers\API;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
	use SendsPasswordResetEmails;
	/**
	 * Create a new controller instance.
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function sendResetLink(Request $request)
	{
		try {
			$this->validateEmail($request);

			// We will send the password reset link to this user. Once we have attempted
			// to send the link, we will examine the response then see the message we
			// need to show to the user. Finally, we'll send out a proper response.
			$response = $this->broker()->sendResetLink(
				$request->only('email')
			);


			$response == Password::RESET_LINK_SENT
				? $this->sendResetLinkResponse($response)
				: $this->sendResetLinkFailedResponse($request, $response);

			if($response == "passwords.sent"){

				$response1["error"]= false;
				$response1["message"]="reset link sent to email";

				return response()->json($response1);
			}

			$response1["error"]= true;
			$response1["message"]="user not found";

			return response()->json($response1);
		} catch (\Exception $e) {
			return response()->json( [
				'errors'  => $e->getMessage(),
				'message' => 'Please try again',
				'status'  => false
			], 200 );
		}


	}
}
