<?php

/*
 * This file is part of PHP CS Fixer.
 * (c) php-team@yaochufa <php-team@yaochufa.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace app\Http\Controllers;

use app\Http\Requests\GroupPost;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    private $request = null;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

	public function save(GroupPost $request)
	{
		if ($this->request->isMethod('post')) {
			echo $this->request->getMethod();die;
			/*//手动校验
			$this->validate($this->request, [
					'group.name' => 'bail|required|unique:group|max:32', //bail 首次验证失败后停止检查属性其它验证规则
					'group.flag' => 'bail|required|unique:group|max:16|min:6',
				], [
					'group.name.required' => '分组名称不能为空',
					'group.name.unique'   => '分组名称已存在',
					'group.name.max'      => '分组名称不能超过32个字符',
				]
			);*/
			//echo '<pre>';
			//print_r($this->request->toArray());
			//$request->
		} else {
			return view('group.edit');
		}
	}

    public function create()
    {
		return view('group.edit');
    }
}
