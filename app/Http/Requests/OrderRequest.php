<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'fname'=>"required|min:3|max:50|regex:/(^([a-zA-Z0-9&'’ ]+)(\d+)?$)/u",
            'lname'=>"required|min:3|max:50|regex:/(^([a-zA-Z0-9&'’ ]+)(\d+)?$)/u",
            'email'=>"required|email",
            'phone'=>"required|min:10|max:15|regex:/(^([+0-9 -]+)(\d+)?$)/u",
            'address'=>"required",
            'qty'=>"required|numeric|gt:0|lt:10",
        ];
    }

    public function messages()
    {
        return [
            'fname.regex'=>'Special character not allowed.',
            'lname.regex'=>'Special character not allowed.',
            'phone.min'=>'Please type a valid Phone #.',
            'phone.max'=>'Please type a valid Phone #.',
            'phone.regex'=>'Please type a valid Phone #.',
            'qty.required'=>'The Quantity must be required.',
            'qty.numeric'=>'The Quantity must be numeric.',
            'qty.gt'=>'The Quantity must be greater than 0.',
            'qty.lt'=>'The Quantity must be less than 10.',
        ];
    }
}
