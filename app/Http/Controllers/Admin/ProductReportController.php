<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Company;
use App\Brand;
use App\ProductType;
use App\Unit;
use App\Attribute;
use App\AttributeGroup;
use App\ProductAttribute;


class ProductReportController extends Controller
{
    /* This Function Create Product Category Show 
    * The List
    */

    public function Categoryproduct()
    {
        $category = Category::where('category_id', 0)->get();
        return view('admin.product.page', compact('category'));
    }
   
   /* This Function Create Product Page Category owaj Show Product*/

    public function Pageproduct(Request $request)
    {
        $product = Product::where('categorys_id', $request->categorys_id)->orWhere('categorys_id', $request->category_id)->get();
        return view('admin.product.productpage', compact('product'));
    }

    /*This Function Not Recource Method 
    * This Function Created Product Index list Show
    * And This Page Report Create . 
     */

    public function Report(Request $request)
    {
        $data['attributeGroup'] =AttributeGroup::all();
        $data['attribute'] =Attribute::all();
        $data['unit'] = Unit::all();

        /*$attribute_id =ProductAttribute::where('attribute_group_id',$request->attribute_group_id)->first();
        $product = Product::where('id', $attribute_id->product_id)->first();
        $price = $attribute_id->price_increment + $product->mrp;*/
    
        $filters = [
            'attribute_group_id' => $request->input('attribute_group_id'),
            'attribute_id' => $request->input('attribute_id'),
            'unit_id' => $request->input('unit_id'),
            /*'f_price' => $request->input('fprice'),
            't_price' => $request->input('tprice')*/
        ];



        $productattribute = ProductAttribute::where(function ($query) use ($filters) {
        
            if ($filters['attribute_group_id']) {
                $query->where('attribute_group_id', '=', $filters['attribute_group_id']);
            }
            if ($filters['attribute_id']) {
                $query->where('attribute_id', '=',  $filters['attribute_id']);
            }
            if ($filters['unit_id']) {
                $query->where('unit_id', '=',  $filters['unit_id']);
            }
            /*if ($filters['f_price']) {
                $query->whereBetween('price_increment', [$filters['f_price'], $filters['t_price']]);
            }*/
        })->distinct()->get();
        $product=[];
        foreach ($productattribute as $key => $value) {
            $products= Product::where('id', $value->product_id)->get();
            $product[]= $products;
        }
        return view('admin.report.product',$data,compact('product'));
    }
    /* This Function Create Product Form 
    * Category Input Box Call Ajax 
    * with Recursive
    */

    public function category(Request $request)
    {   
        $categorytreeview = Category::where('category_id', $request->category_id)->get();
        return Response()->json($categorytreeview);
    }
}
