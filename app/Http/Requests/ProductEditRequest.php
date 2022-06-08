<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'heading'=>"required|min:3|max:50|regex:/(^([a-zA-Z0-9&'’ ]+)(\d+)?$)/u",
            'actule_price'=>'required|regex:/(^([0-9]+)(\d+)?$)/u',
            'sale_price'=>'required|regex:/(^([0-9]+)(\d+)?$)/u',
            'star_rating'=>'required|regex:/(^([0-5])(\d+)?$)/u',
            'description'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id.regex'=>'Please select from list.',
            'heading.regex'=>'Special character not allowed.',
            'regex'=>'Type only number or numeric.',
            'star_rating.regex'=>'Rating must be lessthen 5.',
        ];
    }
}
