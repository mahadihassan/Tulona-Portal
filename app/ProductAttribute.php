<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
     protected $fillable = [
        'product_id', 'attribute_group_id', 'attribute_id', 'unit_id', 'qty', 'price_increment', 'status', 'created_by', 'updated_by'
    ];
}
