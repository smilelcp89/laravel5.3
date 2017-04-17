<?php

namespace app\Listeners;

use app\Events\OrderSuccess;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderSuccessListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderSuccess  $event
     * @return void
     */
    public function handle(OrderSuccess $event)
    {
		echo '<pre>';
		print_r($event->order['order_no']);
		echo '<br/>';
		print_r($event->order['order_price']);
        echo '通知用户支付失败。。。。';
    }
}
