<?php

namespace app\Http\Controllers;

use app\Events\OrderSuccess;
use app\Jobs\SendEmail;
use app\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
		$orders = DB::table('orders')->select('id', 'order_no')->paginate(2);
		print_r($orders->links());die;
		return view('order.index', ['orders' => $orders]);exit;

		$order = Order::with('user')->find(1)->toArray();
		echo '<pre>';print_r($order);
		exit();
        echo '<pre>';
        //print_r(DB::table('order')->select('id', 'order_no')->get()->toArray());
        print_r(Order::all()->toArray());
        exit;
        //分页
        $orders = DB::table('order')->select('id', 'order_no')->paginate(2);
        //return view('order.index', ['orders' => $orders]);
        echo '===========================================<br/>';
        //批量获取
        DB::table('order')->orderBy('id')->chunk(2, function ($orders) {
            foreach ($orders as $order) {
                echo '<pre>';
                print_r($order);
            }
        });
    }

    public function create()
    {
        //echo Order::create(['order_no' => 12345678, 'order_price' => 1000]);
        //Order::where('id',1)->update(['order_no'=>11111111]);
       $order = Order::findOrFail(1);
        if (!empty($order)) {
            //调用事件
            event(new OrderSuccess($order));
        } else {
            echo '不存在这个订单';
        }
    }

    /**
     * 取消订单，发送邮件，先将邮件推送到队列再发送邮件.
     */
    public function cancel()
    {
        //echo '<pre>'; print_r(unserialize('{"job":"Illuminate\\Queue\\CallQueuedHandler@call","data":{"commandName":"app\\Jobs\\SendEmail","command":"O:18:\"app\\Jobs\\SendEmail\":5:{s:8:\"\u0000*\u0000order\";O:45:\"Illuminate\\Contracts\\Database\\ModelIdentifier\":2:{s:5:\"class\";s:9:\"app\\Order\";s:2:\"id\";i:1;}s:6:\"\u0000*\u0000job\";N;s:10:\"connection\";N;s:5:\"queue\";N;s:5:\"delay\";O:13:\"Carbon\\Carbon\":3:{s:4:\"date\";s:26:\"2017-01-25 14:49:22.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"PRC\";}}"},"id":"ikXGGnCpZhW7Bfm6icGOTnvJuBv0mYV7","attempts":1}'));die;
        $order = Order::findOrFail(1);
        dispatch(new SendEmail($order));
        //dispatch((new SendEmail($order))->onQueue('队列名称'));
        //dispatch((new SendEmail($order))->onConnection('sqs'));
        //延时消费任务
        //dispatch((new SendEmail($order))->delay(Carbon::now()->addMinutes(10)));
    }
}
