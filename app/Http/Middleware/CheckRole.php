<?php

namespace app\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $name)
    {
		echo $role.'=======';
		echo $name.'=======';
		//BeforeAction操作
		echo '执行action前：'.$request->getMethod().'<br/>';

		echo '<br/>action输出的内容：';
        $response = $next($request);
		echo '<br/>要在执行后操作，action中不能出现终止的操作，如使用：die,exit<br/>';

		//AfterAction操作
		echo '<br/>执行action后：这里操作<br/>';
		return $response;
    }
}
