<?php

namespace App\Http\Requests\OurMember;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateRequest extends FormRequest
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
    public function rules(Request $r)
    {
        $id=encryptor('decrypt',$r->uptoken);
        if($r->status ==1)
            return ['personalPhone'=>'required|unique:our_members,personal_phone,'.$id,];
        else 
            return [];
    }

    public function messages(){
        return [
            'required' => "The :attribute filed is required",
            'unique' => "The :attribute already used. Please try another",
        ];
    }
}
