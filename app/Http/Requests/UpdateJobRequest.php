<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
            'title' => 'required|min:10|max:255|string',
            'type' => 'required',
            'tags' => 'required|string',
            'category' => 'required',
            'salary_upto' => 'required|numeric',
            'description' => 'required|string|min:60|max:1500'
        ];
    }
}
