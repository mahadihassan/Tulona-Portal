<?php

use App\ProductImage;

//Product List Show Product Image
function productImage($productId)
{
	$product_image = ProductImage::where('product_id', $productId)->get();
	return $product_image;
}


