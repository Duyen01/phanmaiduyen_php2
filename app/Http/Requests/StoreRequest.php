<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            //
            'name'      => 'required|string|min:2|max:100',
            'email'     => 'required|string|email|max:100',
            'phone' => 'required|min:11|numeric',
            'email'     => 'required|string|email|max:100',
            'avt'       => 'required|mimes:jpg,pnd,jpeg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            //
            'name.required' => 'Name user can not be blank',
            'email.required' => 'Email name can not be blank',
            'phone.required' => 'Email name can not be blank',
            'name.unique' => 'This product is available in Database',
            'email.email' => 'Email must be in the correct format',
            'phone.numeric' => 'Enter the number'

        ];
    }
}
