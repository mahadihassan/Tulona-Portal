<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Category;
use App\Brand;
use App\Product;
use App\ProductType;
use App\Metatag;
use App\Company;
use App\Country;
use App\Unit;
use App\Attribute;
use App\AttributeGroup;
use App\ProductImage;
use App\ProductVideo;
use App\ProductAttribute;
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
        $data['attributeGroup'] =AttributeGroup::all();
        $data['attribute'] =Attribute::all();
        $data['unit'] = Unit::all();
        $data['product'] = Product::all();
        return view('admin.product.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = Category::where('category_id', 0)->get();
        $data['product_type'] = ProductType::all();
        $data['company'] = Company::all();
        $data['brand'] = Brand::all();
        $data['country'] = Country::all();
        $data['meta'] = Metatag::all();
        $data['unit'] = Unit::all();
        $data['attribute'] = Attribute::all();
        $data['attributeGroup'] = AttributeGroup::all();
        return view('admin.product.create',$data);
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
       
        $product = new Product;
        $product->name = $request->input('name');
        $product->featured = $request->has('featured') ? 1 : 0;
        $product->categorys_id = $request->input('category_id');
        $product->product_types_id = $request->input('product_type');
        $product->brands_id = $request->input('brand_id');
        $product->companies_id = $request->input('company');
        $product->model = $request->input('model');
        $product->mrp = $request->input('mrp');
        $product->short_descripation = $request->input('short_descripation');
        $product->long_descripation = $request->input('long_descripation');
        $product->countrys_id = $request->input('country');
        $product->meta_tag =implode(',', $meta_tag);
        $product->status = $request->input('published');
        $product->created_by = $user->id;
        $product->save();

        // Insert Product Image Table Data
        $files = $request->file('image');
        $image_title = $request->input('image_title');
        for($i =0; $i< count($image_title); $i++)
        {
            if(!empty($files[$i]))
            {
                if($file = $files[$i])
                {
                    $name = rand().$file->getClientOriginalName();
                    $path = $file->move(public_path('Image/Product'), $name);
                    $size = $path->getSize();
                    ProductImage::create([
                        'product_id' => $product->id,
                        'title' => isset($image_title[$i]) ? $image_title[$i] : '',
                        'image' => isset($name) ? $name : 0,
                        'size' => isset($size) ? $size : 0,
                        'created_by'=> $user->id,
                    ]);
                }
            }
        }

        //Insert Product Attributs Table Data
        $input = $request->input('attributeGroup');
        for ($i=0; $i < count($input); $i++) { 
            if(!empty($request->attributeGroup[$i]) && !empty($request->attribute[$i]))
            {  
                ProductAttribute::create([
                    'product_id' => $product->id,
                    'attribute_group_id' => $request->attributeGroup[$i],
                    'attribute_id' =>isset($request->attribute[$i]) ? $request->attribute[$i] : 0,
                    'unit_id' => isset($request->unit[$i]) ? $request->unit[$i] : 0 ,
                    'price_increment' => isset($request->price[$i]) ? $request->price[$i] : 0,
                    'qty' => isset($request->qty[$i]) ? $request->qty[$i] : 0,
                    'created_by'=> $user->id,
                ]);
            }
        }
        // Insert Product Videos Table Data
        DB::table('product_videos')->insert([
            'product_id' => $product->id,
            'title' => $request->input('video_title'),
            'video_link' => $request->input('video_link'),
            'created_by' => $user->id,
        ]);
        // Insert Meta Tag Table Data
        foreach ($meta_diff as $key => $value) {
            DB::table('metatags')->insert([
                'name'=> $value,
                'created_by'=> $user->id,
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
        $data['category'] = Category::all();
        $data['product_type'] = ProductType::all();
        $data['company'] = Company::all();
        $data['brand'] = Brand::all();
        $data['country'] = Country::all();
        $data['meta'] = Metatag::all();
        $data['unit'] = Unit::all();
        $data['attribute'] = Attribute::all();
        $data['attribute_group'] = AttributeGroup::all();
        $product = Product::find($id);
        $products = $product->id;
        $product_video = ProductVideo::where('product_id', $products)->first();
        $data['product_image'] = ProductImage::where('product_id', $products)->get();
        $data['product_attribute'] = ProductAttribute::where('product_id', $products)->get();
        return view('admin.product.edit', $data, compact('product', 'product_video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $user = Auth::user();
        $product =Product::find($id);
        $product->name = $request->input('name');
        $product->featured = $request->has('featured') ? 1 : 0;
        $product->brands_id = $request->input('brand_id');
        $product->companies_id = $request->input('company_id');
        $product->product_types_id = $request->input('product_type_id');
        $product->categorys_id = $request->input('category_id');
        $product->countrys_id = $request->input('country_id');
        $product->model = $request->input('model');
        $product->mrp = $request->input('mrp');
        $product->meta_tag =implode(',', $request->meta_tag);
        $product->short_descripation = $request->input('short_descripation');
        $product->long_descripation = $request->input('long_descripation');
        $product->status = $request->input('published');
        $product->updated_by = $user->id;
        $product->save();

        //Product Video Table Update.
        $product_video = ProductVideo::where('product_id', $product->id)->first();
        $product_video->title = $request->input('video_title');
        $product_video->video_link = $request->input('video_link');
        $product_video->updated_by = $user->id;
        $product_video->save();

        //Product Image Table Data Update 
        $image_input = $request->all('productImageId');
        foreach ($image_input as $value) {
            foreach ($value as  $row) {
                $product_image = ProductImage::find($row['id']);
                if(!empty($row['image']))
                {
                    if($file =$row['image'])
                    {           
                        $name = " ";
                        $album = $product_image->image;
                        $filename = public_path() . '/Image/Product/' . $album;
                        \File::delete($filename);
                        $name = rand().$file->getClientOriginalName();
                        $path = $file->move(public_path('Image/Product'), $name);
                        $size = $path->getSize();
                        $product_image->image = $name;
                    }
                    $product_image->size = $size;
                    $product_image->title = $row['image_title'];
                    $product_image->updated_by = $user->id;
                    $product_image->save();
                }
                else
                {
                    $product_image->title = $row['image_title'];
                    $product_image->updated_by = $user->id;
                    $product_image->save();
                }
            }
        }

        // Insert Product Image Table Data
        $files = $request->file('newImage');
        $image_title = $request->input('newImageTitle');
        for($i =0; $i< count($image_title); $i++)
        {
            if(!empty($files[$i]))
            {
                if($file = $files[$i])
                {
                    $name = rand().$file->getClientOriginalName();
                    $path = $file->move(public_path('Image/Product'), $name);
                    $size = $path->getSize();
                    ProductImage::create([
                        'product_id' => $product->id,
                        'title' => isset($image_title[$i]) ? $image_title[$i] : '',
                        'image' => isset($name) ? $name : 0,
                        'size' => isset($size) ? $size : 0,
                        'created_by'=> $user->id,
                    ]);
                }
            }
        }

        //Product Attribute Table Update 
        $input = $request->input('productAttributeId');
        foreach ($input as  $row) {
            $product_attribute = ProductAttribute::find($row['id']);
            $product_attribute->attribute_group_id = $row['attributeGroup'];
            $product_attribute->attribute_id = $row['attribute'];
            $product_attribute->unit_id = $row['unit'];
            $product_attribute->price_increment  = $row['price'];
            $product_attribute->qty = $row['qty'];
            $product_attribute->updated_by = $user->id;
            $product_attribute->save();
        }

        // Product Attribute Table New Data Create.
        $inputs = $request->input('newAttributeGroup');
        for ($i=0; $i < count($inputs); $i++) { 
            if(!empty($request->newAttributeGroup[$i]) && !empty($request->newAttribute[$i]))
            {  
                ProductAttribute::create([
                    'product_id' => $product->id,
                    'attribute_group_id' => $request->newAttributeGroup[$i],
                    'attribute_id' => $request->newAttribute[$i],
                    'unit_id' => isset($request->newUnit[$i]) ? $request->newUnit[$i] : 0,
                    'qty' => isset($request->newQty[$i]) ? $request->newQty[$i] : 0,
                    'price_increment' => isset($request->newPrice[$i]) ? $request->newPrice[$i] : 0,
                    'created_by'=> $user->id,
                ]);
            }
        }
        session()->flash('message', 'Product Update Successfully');
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
