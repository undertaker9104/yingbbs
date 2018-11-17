<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|email',
            'introduction' => 'max:80',
            'avatar' => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200',
        ];
    }

    public function messages() {

        return [
            'avatar.mimes' =>'頭像必须是 jpeg, bmp, png, gif 格式的圖片',
            'avatar.dimensions' => '圖片的清晰度不夠，寬和高需要 200px 以上',
            'name.unique' => '用户名已被使用，请重新填寫',
            'name.regex' => '用户名只支持英文、数字、橫槓和下滑線。',
            'name.between' => '用户名必须介於 3 - 25 個字符之間。',
            'name.required' => '用户名不能為空。',
        ];
    }
}
