<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
    	'product_id', 'title', 'image', 'size', 'descripation', 'status', 'created_by', 'updated_by'
    ];
}
