<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            
            'name' => 'bail|required|unique:users,name',

            'password' => 'required|min:6|max:20|UpperExist|LowerExist|SpecialExist|DigitExist',

            'ConfirmPassword' => 'bail|required|same:password',

            'email' => 'bail|required|email'

        ];
    }
}
