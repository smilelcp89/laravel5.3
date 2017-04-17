<?php

namespace app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
		//在这里可以校验是否有权限等
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
            'user.username' => 'required|max:10',
            'user.password' => 'required',
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
    }

    /**
     * 修改校验错误的提示信息.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user.username.required' => '用户名必须填写',
            'user.username.max'      => '用户名不能超过10个字符',
            'user.password.required' => '密码必须填写',
        ];
    }
}
