<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=> 'required',
            'brand_id'=> 'required',
            'company'=> 'required',
            'product_type'=> 'required',
            'category_id'=> 'required',
            'country' => 'required',
            'model' => 'required',
            'mrp' => 'required',
            'model' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_tag' => 'required',
            'short_descripation' => ['required','string', 'max:200'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Product Name field is required',
            'brand_id.required' => 'Brand field is required',
            'company.required' => 'Company field is required',
            'product_type.required' => 'Product Type field is required',
            'category_id.required' => 'Parent Category field is required',
            'country.required' => 'Country Field is required',
            'model.required' => 'Product Model field is required',
            'mrp.required' => 'MRP Field is required',
            'image.required' => 'Image Field is required',
            'meta_tag.required' => 'Meta Tag Field is required',
            'short_descripation.required' => 'Short descripation Field is required',
            
        ];
    }
}
