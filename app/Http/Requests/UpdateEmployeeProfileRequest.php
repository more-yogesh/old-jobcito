<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeProfileRequest extends FormRequest
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
            'name' => 'nullable|string|min:3|max:60',
            'title' => 'nullable|string|min:6|max:120',
            'contact' => 'nullable|numeric|digits:10|unique:employee_profiles,contact,'.auth()->user()->employee->id,
            'dob' => 'nullable|date_format:Y-m-d|before:-15 years',
            'zipcode' => 'nullable|numeric|digits:6',
            'city_id' => 'required|numeric',
            'overview' => 'nullable|string|min:10|max:1500',
            'expected_salary' => 'nullable|numeric|min:3000|max:1000000',
            'last_salary' => 'nullable|numeric|min:3000|max:1000000',
        ];
    }

    public function messages()
    {
        return [
            'dob.date_format' => 'Date Of Birth Should Be In Year-Month-Date Format',
            'dob.before' => 'Your Age Must Be At Least 15 Years Old',
            'city_id' => 'Please select your city'
        ];
    }
}
