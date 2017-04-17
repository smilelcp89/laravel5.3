<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Route;
use app\Http\Services\ImageService;
class PhotoController extends Controller
{
	public function __construct(ImageService $image)
	{
		$this->image = $image;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       	return view('photo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$image = app('app\Http\Services\ImageService');
		$image->test();
		//$this->image->say();
		/*$image = app('image');
		$image->test();*/
		//$this->app->make('image');
		//abort(403,'aaaaaaaaaaaaaaaaaa');
		$route = Route::current();
		$name = Route::currentRouteName();
		$action = Route::currentRouteAction();
		//echo '<pre>';print_r($route);
		echo '<pre>';print_r($name);
		echo '<pre>';print_r($action);
		echo '<br/>ok...';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
