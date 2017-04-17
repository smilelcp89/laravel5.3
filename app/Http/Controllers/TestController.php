<?php

/*
 * This file is part of PHP CS Fixer.
 * (c) php-team@yaochufa <php-team@yaochufa.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace app\Http\Controllers;

use app\Http\Requests\StoreUser;
use app\Notifications\InvoicePaid;
use app\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    private $request = null;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function notify(Request $request)
    {
        Mail::send('test.email', ['data'=>[]], function ($message) {
            $message->to('310976780@qq.com')->subject('laravel发送的邮件');
        });
    }

    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->authorize('test');
        $this->request->session()->set('name', 'lcp');
        $this->request->session()->set('age', '27');
        //echo '<pre>';print_r($this->request->session()->all());die;
        $cookie = cookie('mynameqwe', 'lcp', 3);

        return response('Hello World')->cookie($cookie);
        //return response('Hello World')->cookie(
        //	'age', '25', 3, '/', '.local.com'
        //);
    }

    public function download()
    {
        //return response()->download('/data/wwwroot/shop/1.png','ccc.png',['content-type: image/png']);
        $file    = '/data/wwwroot/shop/1.xls';

        return response()->download($file);
    }

    /**
     * 上传图片.
     */
    public function upload(Request $request)
    {
        if ($request->method() == Request::METHOD_GET) {
            return view('test.upload');
        }
        echo '<br/>是否存在某个上传文件：' . $request->hasFile('image');
        echo '<br/>上传文件是否有效：' . $request->file('image')->isValid();
        echo '<br/>是否为目录：' . $request->file('image')->isDir();
        echo '<br/>是否为文件：' . $request->file('image')->isFile();
        echo '<br/>获取上传临时文件的路径：' . $request->file('image')->path();
        echo '<br/>获取上传临时文件的路径：' . $request->file('image')->getRealPath();
        echo '<br/>文件后缀：' . $request->file('image')->extension();
        echo '<br/>获取文件mime类型' . $request->file('image')->getMimeType();
        echo '<br/>错误状态码：' . $request->file('image')->getError();
        echo '<br/>错误信息：' . $request->file('image')->getErrorMessage();
        echo '<br/>最大上传文件的大小：' . $request->file('image')->getMaxFilesize();
        echo '<br/>移动文件，存储根路径默认指向/public目录，返回文件的路径：' . $request->file('image')->move('upload', date('YmdHis') . '.' . $request->file('image')->extension());
        echo '<br/>另存为文件，返回文件的路径：' . $request->file('image')->storeAs('upload', date('YmdHis') . '.' . $request->file('image')->extension());
        echo '<br/>【没生效】保存文件，返回文件的路径：' . $request->file('image')->store('upload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Storage::disk('local')->put('file.txt', 'Contents');
        echo asset('storage/1.png');
        echo Storage::url('1.png');
        //echo '<br/>';
        //echo route('profile', ['id' => 1]);
        //$image = app('app\Http\Services\ImageService');
        //$image->test();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        //这里会直接调用 StoreUser.php进行校验
    }

    public function add(Request $request)
    {
        //使用内置继承的校验
        $this->validate($request, [
            'user.username' => 'required|max:10',
            'user.password' => 'required',
        ], [
            'user.username.required' => '用户名必须填写',
            'user.username.max'      => '用户名不能超过10个字符',
            'user.password.required' => '密码必须填写',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('test.store')->with('name', 'lcp');
        return view('test.store', ['name' => 'lcp']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //获取参数
        echo '获取参数:' . $request->input('name') . ' | ' . $request->get('name');
        echo '<br/>获取全部参数：<pre>' . print_r($request->all());
        echo '<br/>请求方式：' . $request->getMethod(); //$request->method()
        echo '<br/>是否为Ajax请求：' . $request->ajax();
        echo '<br/>请求的url，不包含参数：' . $request->url();
        echo '<br/>请求的url，包含参数==：' . $request->fullUrl();
        echo '<br/>请求的url，包含参数：' . $request->getUri();
        echo '<br/>是否存在某个参数：' . $request->exists('name');
        echo '<br/>请求的参数是否为json：' . $request->isJson();

        if ($request->is('test/*')) {
            echo '匹配url的路径';
            die;
        }
        //只接收哪些参数
        $input = $request->only(['name']);
        //不接收哪些参数
        $input = $request->except(['name']);
        print_r($input);
        die;

        echo '<br/>获取session：' . $request->session()->get('_previous')['url'];
        echo '<br/>session包含某个键名：' . $request->session()->has('_previous');
        echo '<br/>是否有session：' . $request->hasSession();
        echo '<br/>清除session：' . $request->session()->clear();
        echo '<br/>刷新session：' . $request->session()->flush();
        echo '<br/>设置session：' . $request->session()->set('myname', 'lcp');
        echo '<br/>删除session：' . $request->session()->remove('myname');
        echo '<br/>将某个值push到session中的数组：' . $request->session()->push('user.names', 'liang');
        echo '<br/>获取并删除session：' . $request->session()->pull('myname');
        echo '<br/>是否存在某个session：' . $request->session()->exists('_previous');
        echo '<br/>获取全部参数<pre>' . print_r($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
