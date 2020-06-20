<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'username'     => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email'        => 'required|email',
            'introduction' => 'required|max:80',
            'avatar'       => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=102,min_height=102',
        ];
    }

    public function attributes()
    {
        return [
            'introduction' => '个人简介',
            'avatar'       => '用户头像'
        ];
    }
}
