<?php

namespace app\Jobs;

use app\Order;
use Exception;
use Log;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class SendEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

	protected $order;

    /**
     * Create a new job instance.
     */
    public function __construct(Order $order)
    {
		$this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
		//队列执行的任务，写明这里要做什么事情
		Storage::append('queue.txt', '队列要执行的任务');
    }

	/**
	 * 队列任务执行失败，回调的方法
	 */
	public function failed(Exception $e){
		Log::info('队列执行任务失败：'.$e->getMessage());
	}
}
