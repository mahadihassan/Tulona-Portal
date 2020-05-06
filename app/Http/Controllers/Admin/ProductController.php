<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Category;
use App\Brand;
use App\Product;
use App\ProductType;
use App\Metatag;
use App\Company;
use App\Country;
use App\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input as input;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $company = Company::all();
        $producttype = ProductType::all();
        $brand = Brand::all();
        $product = Product::all();
       // $product = Product::whereJsonContains('attributes', 'TB')->OrwhereJsonContains('attributes', 'camara')->get();
        return view('admin.product.list', compact('product', 'category', 'company', 'producttype', 'brand'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('category_id', 0)->get();
        $product_type = ProductType::all();
        $company = Company::all();
        $brand = Brand::all();
        $country = Country::all();
        $meta = Metatag::all();
        $unit = Unit::all();
        $attribute = DB::table('products_attribute')->get();
        return view('admin.product.create', compact('category', 'product_type', 'company', 'brand', 'country', 'meta', 'attribute', 'unit'));
    }

    /* Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $user = Auth::user();
        //Metatag Table Store Data Difference
        $meta = Metatag::pluck('name')->toArray();
        $meta_tag = $request->input('meta_tag');
        $meta_tagcase = array_map('strtolower',$meta_tag);
        $meta_diff = array_diff($meta_tagcase, $meta);

        //Attribut Table data Difference;
        $attribute = DB::table('products_attribute')->pluck('name')->toArray();
        $attribute_name = $request->input('att_name');
        $attribute_value = $request->input('att_value');
        $attribute_unit = $request->input('att_unit');

        /*$attribute_value = $request->input('attribute_value');
        $unit = $request->input('unit');
        $attribute_combain = array_combine($attribute_name, $attribute_value);*/
        //$array_att = array($attribute_name);
        $all_attribute = array($attribute_name, $attribute_value, $attribute_unit);
        $attribute_namecase = array_map('strtolower',$attribute_name);
        $attribute_diff = array_diff($attribute_namecase, $attribute);
        $product = new Product;
        $product->name = $request->input('name');
        $product->featured = $request->has('featured') ? 1 : 0;
        $product->categorys_id = $request->input('category_id');
        $product->product_types_id = $request->input('product_type');
        $product->brands_id = $request->input('brand_id');
        $product->companies_id = $request->input('company');
        $product->model = $request->input('model');
        $product->mrp = $request->input('mrp');
        if($file = $request->file('image'))
        {
            foreach ($file as $files) {
                $name = rand().$files->getClientOriginalName();
                $files->move(public_path('Image/Product'), $name);
                $image[] = $name;
            }
            $product->image = implode(',', $image);
        }
        $product->attributes = $all_attribute;
        $product->short_descripation = $request->input('short_descripation');
        $product->long_descripation = $request->input('long_descripation');
        $product->countrys_id = $request->input('country');
        $product->meta_tag =implode(',', $meta_tag);
        $product->status = $request->input('published');
        $product->created_by = $user->id;
        $product->save();
        if(!empty($attribute_diff))
        {
            foreach ($attribute_diff as $key => $value) {
                $data = DB::table('products_attribute')->insert([
                    'name'=> $value,
                ]);
            }
        }
        foreach ($meta_diff as $key => $value) {
            $data = DB::table('metatags')->insert([
                'name'=> $value,
            ]);
        }
        session()->flash('message', 'Product Create Successfully');
        session()->flash('type', 'success');
        return redirect('admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $product_type = ProductType::all();
        $company = Company::all();
        $brand = Brand::all();
        $country = Country::all();
        $meta = Metatag::all();
        $attribute = DB::table('products_attribute')->get();
        $product = Product::find($id);
        return view('admin.product.edit', compact('category', 'product_type', 'company', 'brand', 'country', 'meta', 'attribute', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
         $role =[
            'name'=> 'required',
            'category_id'=> 'required',
            'product_type'=> 'required',
            'brand_id'=> 'required',
            'company'=> 'required',
            'model' => 'required',
            'mrp' => 'required',
            'price' => 'required',
            'model' => 'required',
            'short_descripation' => ['required','string', 'max:200'],
            'country' => 'required',
        ];
        $customMessages = [
            'name.required' => 'Name field is required',
            'category_id.required' => 'Category Name field is required',
            'product_type.required' => 'Product Type field is required',
            'brand_id.required' => 'Brand field is required',
            'company.required' => 'Company field is required',
            'model.required' => 'Product Model field is required',
            'mrp.required' => 'MRP Field is required',
            'price.required' => 'Price Field is required',
            'short_descripation.required' => 'short descripation Field is required',
            'country.required' => 'Country Field is required',
        ];
        $this->validate($request, $role, $customMessages);
        $user = Auth::user();
        $attribute = DB::table('products_attribute')->pluck('name')->toArray();
        $meta = Metatag::pluck('name')->toArray();
        $meta_tag = $request->input('meta_tag');
        $meta_tagcase = array_map('strtolower',$meta_tag);
        $meta_diff = array_diff($meta_tagcase, $meta);
        $attribute_name = $request->input('attribute_name');
        $attribute_namecase = array_map('strtolower',$attribute_name);
        $attribute_diff = array_diff($attribute_namecase, $attribute);
        $attribute_value = $request->input('attribute_value');
        $attribute_values =array_filter($attribute_value); 
        $com = array_combine($attribute_namecase,$attribute_values);
        $product =Product::find($id);
        $product->name = $request->input('name');
        $product->categorys_id = $request->input('name');
        $product->categorys_id = $request->input('category_id');
        $product->product_types_id = $request->input('product_type');
        $product->brands_id = $request->input('brand_id');
        $product->companies_id = $request->input('company');
        $product->model = $request->input('model');
        $product->mrp = $request->input('mrp');
        $product->price = $request->input('price');
        if($file = $request->file('image'))
        {
            $productfile =$product->image;
            $deletefile = explode(',', $productfile);
            foreach ($deletefile as $files) {
                $filename = public_path() . '/Image/Product/' . $files;
                \File::delete($filename);
            }
            foreach ($file as $files) {
                $name = rand().$files->getClientOriginalName();
                $files->move(public_path('Image/Product'), $name);
                $image[] = $name;
            }
            $product->image = implode(',', $image);
        }
        $product->attributes =$com;
        $product->short_descripation = $request->input('short_descripation');
        $product->long_descripation = $request->input('long_descripation');
        $product->countrys_id = $request->input('country');
        $product->meta_tag =implode(',', $meta_tag);
        $product->status = $request->input('published');
        $product->created_by = $user->id;
        $product->save();
        foreach ($attribute_diff as $key => $value) {
            $data = DB::table('products_attribute')->insert([
                'name'=> $value,
            ]);
        }
        foreach ($meta_diff as $key => $value) {
            $data = DB::table('metatags')->insert([
                'name'=> $value,
            ]);
        }
        session()->flash('message', 'Product Create Successfully');
        session()->flash('type', 'success');
        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $productfile =$product->image;
        $file = explode(',', $productfile);
        foreach ($file as $files) {
            $filename = public_path() . '/Image/Product/' . $files;
            \File::delete($filename);
        }
        $product->delete();
        session()->flash('message', 'Product Delete Successfully');
        session()->flash('type', 'success');
        return redirect('admin/product');
    }

    
}
