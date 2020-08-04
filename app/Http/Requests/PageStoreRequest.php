<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageStoreRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:255|unique:pages',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|in:on,off'
        ];
    }
}
