<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ReplyRequest extends FormRequest
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

    public function rules()
    {

        switch($this->method())
        {
            // CREATE
            case 'POST':
            {
                return [
                    'content' => 'required|min:3|string'
                ];
            }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    // UPDATE ROLES
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            }
        }
    }

    public function attributes()
    {
        return [
            'content'  => '評論'
        ];
    }

    public function messages()
    {
        return [
            // Validation messages
        ];
    }
}
