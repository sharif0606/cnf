<?php

namespace App\Http\Requests\videoNotice;

use Illuminate\Foundation\Http\FormRequest;

class AddNewRequest extends FormRequest
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
            'short_description'=>'string|max:100',
        ];
    }

    public function messages(){
        return [
            'short_description.string' => 'Title 1 must be a string.',
            'short_description.max' => 'Short Description may not be greater than 100 characters long.',
        ];
    }
}
