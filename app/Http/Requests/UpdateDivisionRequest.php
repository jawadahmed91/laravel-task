<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDivisionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // Get the division ID from the route (to exclude it from the unique check)
        $divisionId = $this->route('division')->id;

        return [
            'name' => 'required|unique:divisions,name,' . $divisionId,
            'province_id' => 'required|exists:provinces,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The division name is required.',
            'name.unique' => 'This division name has already been taken.',
            'province_id.required' => 'The province is required.',
            'province_id.exists' => 'The selected province is invalid.',
        ];
    }
}

