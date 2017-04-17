<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		/*if($request->user()->can('test', 3)){
			echo 'okok';die;
		}else{
			echo '无权限操作';die;
		}

		if($request->user()->cannot('test', 3)){
			echo '无权限操作';die;
		}else{
			echo 'okok';die;
		}


		if(Gate::denies('test', 4)){
			//拒绝访问后操作
			//abort('403','no access');
		}

		if(Gate::allows('test', 4)){
			//允许访问后操作
			//abort('403','no access');
		}

		if($this->authorize('test',3)){
			echo 'ok';
		}*/


		//$request->user();
		//echo encrypt(123456);die;
		//$user = Auth::user();
        //echo '<pre>';
		//效果和Auth::user()是一样的
        //print_r($request->user());

        return view('home');
    }
}
