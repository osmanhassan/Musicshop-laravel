<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            
            'name' => 'bail|required|max:30|regex:/^[a-zA-Z]+$/',

            'phone' => 'bail|required|digits:11',

            'address' => 'bail|required|max:100',

            'bkash' => 'bail|required|digits:11',

            'confirm_bkash' => 'bail|required|same:bkash',

        ];
    }

    public function messages(){
        return [

            'name.regex' => 'The name field can contain only letters and name should be one word.',

            'phone.digits' => 'Please enter a valid phone number.',

            'bkash.digits' => 'Please enter a valid bkash number.',
        ];

    }
}
