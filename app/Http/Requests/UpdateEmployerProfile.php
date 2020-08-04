<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployerProfile extends FormRequest
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
            'name' => 'required|string|min:3|max:60',
            'contact' => 'required|numeric|digits:10|unique:employer_profiles,contact,' . auth()->user()->employerProfile->id,
            'website' => 'nullable|url|active_url',
            'address1' => 'required|string|min:10|max:255',
            'address2' => 'nullable|string|min:10|max:255',
            'amenities' => 'nullable|string|min:10',
            'services' => 'nullable|string|min:10',
            'overview' => 'nullable|string|min:10',
            'contact_email' => 'nullable|email|max:255',
            'zipcode' => 'required|numeric|digits:6',
            'city_id' => 'required|numeric',
            'total_employees' => 'required|numeric|min:2|max:1000',
            'average_salary' => 'nullable|numeric|min:3000|max:1000000',
        ];
    }
}
