<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_id'=> 'required',
            'name'=> ['required']
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Parent Category Field is required',
            'name.required' => 'Category Name field is required',
        ];
    }
}
