<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'brand_id' => 'required',
            'company_id' => 'required',
            'product_type_id' => 'required',
            'category_id' => 'required',
            'country_id' => 'required',
            'model' => 'required',
            'mrp' => 'required',
            'short_descripation' => ['required','string', 'max:200']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Product Name field is required',
            'brand_id.required' => 'Brand Name field is required',
            'company_id.required' => 'Company Name field is required',
            'product_type_id.required' => 'Product Type Name Filed is required',
            'category_id.required' => 'Category Name filed is required',
            'country_id.required' => 'Country Name filed is required',
            'model.required' => 'Model filed is required',
            'mrp.required' => 'Mrp filed is required',
        ];
    }


}
