<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'heading'=>"required|min:3|max:50|regex:/(^([a-zA-Z0-9&'’ ]+)(\d+)?$)/u|unique:categories",
            'position'=>'required|min:1|max:8|regex:/(^([0-9]+)(\d+)?$)/u|unique:categories',
            'image'=>'required|unique:categories',
        ];
    }

    public function messages()
    {
        return [
            'regex'=>'Special character not allowed.',
        ];
    }
}
