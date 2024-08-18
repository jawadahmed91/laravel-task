<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProvinceRequest extends FormRequest
{
    public function authorize()
    {
        // Return true if you want to allow this request to be authorized.
        // You can also implement additional authorization logic here.
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:provinces,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The province name is required.',
            'name.unique' => 'This province name has already been taken.',
        ];
    }

}
