<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployer extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // to do add verification and rules on the rights to create a employer
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|required|max:255',
            'email' => 'required|email',
//            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'phone' => 'required|numeric',
            'company_id' => 'required|exists:companies,id',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required!',
            'last_name.required' => 'Last name is required!',
            'email.required' => 'Email is required!',
            'phone.required' => 'Phone is required!',
            'company_id.required' => 'Company is required!',
        ];
    }
}
