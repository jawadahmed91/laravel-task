<?php

// app/Http/Requests/UpdateProvinceRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProvinceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // Get the province ID from the route (for the unique rule)
        $provinceId = $this->route('province')->id;

        return [
            'name' => 'required|unique:provinces,name,' . $provinceId,
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