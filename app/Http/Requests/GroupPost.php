<?php

namespace app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class GroupPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
		echo '<pre>';print_r($this->request->all());
		echo route('groupsave');die;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'group.name' => 'bail|required|unique:group|max:32', //bail 首次验证失败后停止检查属性其它验证规则
			'group.flag' => 'bail|required|unique:group|max:16|min:6',
		];
    }

	public function messages(){
		return [
			'group.name.required' => '分组名称不能为空',
			'group.name.unique'   => '分组名称已存在',
			'group.name.max'      => '分组名称不能超过32个字符',
		];
	}

	/**
	 * 自定义错误格式.
	 */
	protected function formatErrors(Validator $validator)
	{
		//返回错误信息集合，数组带字段下标
		return $validator->errors()->toArray();
		//返回错误信息集合，数组下标为0,1,2...
		//return $validator->errors()->all();
		//$validator->errors() 可以使用的方法具体参考：		vendor\laravel\framework\src\Illuminate\Support\MessageBag.php
	}
}
