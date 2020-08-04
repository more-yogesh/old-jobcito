<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExperienceRequest extends FormRequest
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
            'company_name' => 'required|string|min:3|max:60|unique:experiences',
            'from_date' => 'required|date_format:Y-m-d|before:today',
            'to_date' => 'required|date_format:Y-m-d',
            'salary' => 'required|numeric',
            'salary_sleep' => 'nullable|in:yes,no',
            'designation' => 'required|string|min:2|max:60'
        ];
    }
}
