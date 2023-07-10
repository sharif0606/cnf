<?php

namespace App\Http\Requests\OurMember;

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
            'emailAddress'=>'required|unique:our_members,email',
            'CellNo'=>'required',
            'membershipno'=>'unique:our_members,membership_no',
            'password'=>'required'
        ];
    }

    public function messages(){
        return [
            'required' => "The :attribute filed is required",
            'unique' => "The :attribute already used. Please try another",
        ];
    }
}
