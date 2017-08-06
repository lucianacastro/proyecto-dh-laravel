<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class JsonController extends Controller
{
    //
    public function userCount(Request $request) {
    	$countUsers = User::get()->count();
		$result = ['total' => $countUsers];

		return response($result)->header('Content-Type', 'application/json');
	}

	public function userAvailability(Request $request) {
		// user-availability?email=test@example.com
		$status = 200;
		if (!empty($request->query('email'))) {
			$user = User::where('email','=', $request->query('email')) -> first();
			$result = ['available' => !$user];
		} else {
			$result = ['error' => 'Missing email query parameter'];
			$status = 400;
		}

		return response($result, $status)->header('Content-Type', 'application/json');
	}
}
