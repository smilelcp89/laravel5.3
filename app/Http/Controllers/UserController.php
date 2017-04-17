<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Log;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param int $id
     *
     * @return Response
     */
    public function index($id = 0)
    {
		Log::info('测试log');
		/*echo config('app.env');
		echo app()->environment().'------';
		echo App::environment();die;*/
        echo $id . ' My name is cp';
        //return view('user.profile', ['user' => 'liang']);
    }

	public function create(Request $request)
	{
		echo 11313123;die;
	}
}
