<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageEditRequest extends FormRequest
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
            'category_id'=>"required|regex:/(^([0-9]+)(\d+)?$)/u",
            'product_id'=>"required|regex:/(^([0-9]+)(\d+)?$)/u",
            'image'=>'unique:product_images',
        ];
    }

    public function messages()
    {
        return [
            'category_id.regex'=>'Please select from list.',
            'product_id.regex'=>'Please select from list.',
        ];
    }
}
