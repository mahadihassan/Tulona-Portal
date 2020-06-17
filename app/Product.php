<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brands_id', 'categorys_id', 'title', 'product_id', 'dynamic_value', 'image', 'price','quantity', 'descripation', 'status', 'created_by'
    ];

    public function brand()
    {
    	return $this->belongsTo('App\Brand', 'brands_id');
    }
     public function category()
    {
    	return $this->belongsTo('App\Category', 'categorys_id');
    }  
    public function producttype()
    {
        return $this->belongsTo('App\ProductType', 'product_types_id');
    }  
    public function company()
    {
        return $this->belongsTo('App\Company', 'companies_id');
    }  
    public function country()
    {
        return $this->belongsTo('App\Country', 'countrys_id');
    } 
    protected $casts = [
        'attribute_value' => 'array',
        'attribute_name' => 'array',
        'attribute_unit' => 'array',
    ];
}
