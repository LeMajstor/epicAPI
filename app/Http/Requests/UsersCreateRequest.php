<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersCreateRequest extends FormRequest
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
            'name' => 'required|max:50', 
            'email' => 'required|email|max:100|unique:users', 
            'document_number' => 'required|max:25', 
            'phone_number' => 'required|max:15', 
            'country' => 'required|max:2'
        ];
    }
    
}
