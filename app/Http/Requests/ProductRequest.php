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
            'category_id'=> 'required',
            'product_type'=> 'required',
            'brand_id'=> 'required',
            'company'=> 'required',
            'model' => 'required',
            'mrp' => 'required',
            'model' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'short_descripation' => ['required','string', 'max:200'],
            'country' => 'required',
        ];
    }
    public function message()
    {
        return [
            'name.required' => 'Product Name field is required',
            'category_id.required' => 'Parent Category field is required',
            'product_type.required' => 'Product Type field is required',
            'brand_id.required' => 'Brand field is required',
            'company.required' => 'Company field is required',
            'model.required' => 'Product Model field is required',
            'mrp.required' => 'MRP Field is required',
            'image.required' => 'Image Field is required',
            'short_descripation.required' => 'short descripation Field is required',
            'country.required' => 'Country Field is required',
            'meta_tag.required' => 'Country Field is required',
        ];
    }
}
