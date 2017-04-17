<?php

namespace app\Http\Controllers\Admin;

use app\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Http\Controllers\Controller;

class LoginController extends Controller
{
	public function index(Request $request)
	{
		if(Auth::check()){
			echo 'ok...';
		}else{
			echo 'error...';
		}
		//echo '<pre>';print_r($request->user());die;
		return view('login.login');
	}

	/**
	 * Handle an authentication attempt.
	 *
	 * @return Response
	 */
	public function auth(Request $request)
	{
		$email = $request->input('email');
		$password = $request->input('password');
		if ($result = Auth::attempt(['email' => $email, 'password' => $password],true)) {
			return redirect()->intended('home');
		}
	}

	public function logout()
	{
		Auth::logout();
	}
}
