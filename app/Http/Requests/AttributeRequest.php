<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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
            'name' => 'required',
            'attribute_group_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Attribute Name Filed is Required',
            'attribute_group_id.required' => 'Attribute Group Name Filed is Required',
        ];
    }
}
