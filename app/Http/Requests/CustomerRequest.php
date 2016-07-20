<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CustomerRequest extends Request
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
            'first_name' => 'required|regex:/^[a-zA-Z+\s]+$/',
            'last_name' => 'required|regex:/^[a-zA-Z+\s]+$/',
            'phone' => 'required|numeric',

        ];
    }
    // public function messages()
    // {
    //     return [
    //         'first_name.required' => 'A title is required',
    //         'last_name.required'  => 'A message is required',
    //     ];
    // }
}
