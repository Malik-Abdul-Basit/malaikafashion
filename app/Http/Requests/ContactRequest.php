<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'=>"required|min:3|max:50|regex:/(^([a-zA-Z0-9&'’ ]+)(\d+)?$)/u",
            'email'=>'required|email|max:50',
            'phone'=>'required|regex:/(^([0-9]+)(\d+)?$)/u|max:20',
            'message'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'phone.regex'=>'Please type only valid Contact Number.',
        ];
    }
}
