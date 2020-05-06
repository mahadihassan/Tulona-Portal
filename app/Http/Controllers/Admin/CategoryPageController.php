<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Company;
use App\Brand;
use App\ProductType;


class CategoryPageController extends Controller
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
       /* $category = Category::all();
        $company = Company::all();
        $producttype = ProductType::all();
        $brand = Brand::all();
        $product = Product::all();*/
        
        $filters = [/*
            'categorys_id' => $request->input('category_id'),
            'brands_id' => $request->input('brand_id'),
            'product_types_id' => $request->input('product_type_id'),
            'companies_id' => $request->input('company_id'),*/
            'attribute_name' => $request->input('attribute_name'),
            'attribute_value' => $request->input('attribute_value'),
            'attribute_unit' => $request->input('attribute_unit'),
        ];
        $product = Product::where(function ($query) use ($filters) {
        
            /*if ($filters['categorys_id']) {
                $data= $query->where('categorys_id', $filters['categorys_id']);
            }
            if ($filters['brands_id']) {
                $query->where('brands_id', '=', $filters['brands_id']);
            }
            if ($filters['product_types_id']) {
                $query->where('product_types_id', '=', $filters['product_types_id']);
            }
            if ($filters['companies_id']) {
                $query->where('companies_id', '=', $filters['companies_id']);
            }
            */
            if ($filters['attribute_name']) {
                $query->whereJsonContains('attributes', $filters['attribute_name'])->whereJsonContains('attributes', $filters['attribute_value'])->whereJsonContains('attributes', $filters['attribute_unit']);
            }
        })->get();
        dd($product);
        //$product = Product::whereJsonContains('dynamic_value', ['color' => 'blue'])->get();
        return view('admin.product.list', compact('product'));
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
