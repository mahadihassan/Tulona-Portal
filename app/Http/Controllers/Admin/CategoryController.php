<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
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
        /*$categories = Category::where('category_id', 0)
        ->with('childrenCategories')
        ->get();*/
        $category = Category::all();
        return view('admin.category.list', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * function Call App\Http\Helpers\CategoryHelpers 
     */
    public function create()
    {
        $category = fetchCategoryTree(0,'','');
        return view('admin.category.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $user = Auth::user();
        $category = new Category;
        if($request->category_id==0)
        {
            $category->category_id =0;
            $category->name = $request->input('name');
            $category->descripation = $request->input('descripation');
            $category->status = $request->input('published');
            $category->created_by = $user->id;
            $category->save();
        }
        else{
            $category->category_id = $request->input('category_id');
            $category->name = $request->input('name');
            $category->descripation = $request->input('descripation');
            $category->status = $request->input('published');
            $category->created_by = $user->id;
            $category->save();   
        }
        session()->flash('message', 'Category Create Successfully');
        session()->flash('type', 'success');
        return redirect('admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        //This Function Call CategoryHelpers.php Directory .  
        $category = fetchCategoryTree(0,'','');
        $cat = Category::find($id);
        return view('admin.category.edit', compact('cat', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $user = Auth::user();
        $category =Category::find($id);
        if($request->category_id==0)
        {
            $category->category_id = 0;
            $category->name = $request->input('name');
            $category->descripation = $request->input('descripation');
            $category->status = $request->input('published');
            $category->updated_by = $user->id;
            $category->save();
        }
        else{
            $category->category_id = $request->input('category_id');
            $category->name = $request->input('name');
            $category->descripation = $request->input('descripation');
            $category->status = $request->input('published');
            $category->updated_by = $user->id;
            $category->save();   
        }
        session()->flash('message', 'Category Update Successfully');
        session()->flash('type', 'success');
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message', 'Category Update Successfully');
        session()->flash('type', 'success');
        return redirect('admin/category');
    }
}
