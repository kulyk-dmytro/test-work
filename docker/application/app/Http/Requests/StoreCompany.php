<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompany extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //to do add verification and rules on the rights to create a company
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
            'name'    => 'required|max:255',
            'email'    => 'required|email',
            'logo'    => '',
            'website' => 'required|url',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name company is required!',
            'email.required' => 'Email is required!',
//            'logo.required' => 'Phone is required!',
            'website.required' => 'Website is required!',
        ];
    }
}
