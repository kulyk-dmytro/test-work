<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployer extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // to do update verification and rules on the rights to create a employer
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
            'first_name' => 'max:255',
            'last_name' => 'max:255',
            'email' => 'email',
//            'phone' => 'regex:/(01)[0-9]{9}/',
            'phone' => 'required|numeric',
            'company_id' => 'exists:companies,id',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
