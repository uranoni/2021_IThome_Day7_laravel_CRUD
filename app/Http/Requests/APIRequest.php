<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class APIRequest extends FormRequest
{
    protected function failedValidation(Validator $validator) { 
        // write your business logic here otherwise it will give same old JSON response
    throw new HttpResponseException(response()->json($validator->errors(), 400)); 
}
}
