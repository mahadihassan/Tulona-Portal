<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    
    public function attributegroup()
    {
    	return $this->belongsTo('App\AttributeGroup', 'attribute_group_id');
    }

    public function unit()
    {
    	return $this->belongsTo('App\Unit', 'unit_id');
    }
}
