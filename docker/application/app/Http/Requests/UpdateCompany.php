<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompany extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // to do update verification and rules on the rights to create a company
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
            'name'    => 'max:255',
            'email'    => 'email',
            'logo'    => '',
            'website' => 'url',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
