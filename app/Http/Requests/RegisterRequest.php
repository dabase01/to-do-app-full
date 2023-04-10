<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ];
    }
    public function failedValidation(Validator $validator)
        {
        throw new HttpResponseException(response($validator->errors()->all()));
        }
}
