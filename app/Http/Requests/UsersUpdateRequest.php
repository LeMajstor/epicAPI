<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateRequest extends FormRequest
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
            'name' => 'max:50', 
            'email' => 'email|max:100|unique:users', 
            'document_number' => 'max:25', 
            'phone_number' => 'max:15', 
            'country' => 'max:2'
        ];
    }
}
