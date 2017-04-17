<?php

namespace app\Console\Commands;

use app\Http\Services\SmsService;
use app\User;
use Illuminate\Console\Command;

class SendSms extends Command
{
    /**
     * 命令的形式   php artisan sms:send
     *
     * @var string
     */
    protected $signature = 'sms:send {user? : 描述}'; #注意这里的:，两边需要空格

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '描述发送短息命令的功能';

	protected $smsService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SmsService $smsService)
    {
        parent::__construct();
		$this->smsService = $smsService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //获取某个命令行输入参数
        $userName = $this->argument('user');
        //获取所有参数
        //$arr = $this->arguments();
        if(empty($userName)){
			//要求在命令行输入参数：命令行能看到输入
            $userName = $this->ask('Please input user name');
			//要求在命令行输入参数：命令行不可看到输入
            //$userName = $this->secret('Please input user name');
        }
		//确认是否继续执行
		if (!$this->confirm('Do you wish to continue? [y|N]')) {
			return false;
		}

        //获取所有命令行输入参数
        //$arr = $this->arguments();
        $user = User::where('name','=', $userName)->first();
		if(!empty($user)){
			$msg = $this->smsService->send($user->email);
			$this->info($this);
			echo $msg.PHP_EOL;
		}else{
            # 会显示错误信息，并带上颜色
			$this->error('The user is not exists.');
		}
    }
}
