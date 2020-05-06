<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductTypeRequest;
use Illuminate\Support\Facades\Auth;
use App\ProductType;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttype = ProductType::all();
        return view('admin.producttype.list', compact('producttype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.producttype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductTypeRequest $request)
    {
        $user = Auth::user();
        $data = [
            'name' => $request->input('name'),
            'descripation' => $request->input('descripation'),
            'status' => $request->input('published'),
            'created_by' => $user->id,
        ];
        ProductType::create($data);
        session()->flash('message', 'Product Type Create Successfully');
        session()->flash('type', 'success');
        return redirect('admin/producttype');
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
        $producttype = ProductType::find($id);
        return view('admin.producttype.edit', compact('producttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductTypeRequest $request, $id)
    {
        $user = Auth::user();
        $producttype =ProductType::find($id);
        $data = [
            'name' => $request->input('name'),
            'descripation' => $request->input('descripation'),
            'status' => $request->input('published'),
            'created_by' => $user->id,
        ];
        $producttype->update($data);
        session()->flash('message', 'Product Type Update Successfully');
        session()->flash('type', 'success');
        return redirect('admin/producttype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producttype = ProductType::find($id);
        $producttype->delete();
        session()->flash('message', 'Brand Delete Successfully');
        session()->flash('type', 'success');
        return redirect('admin/producttype');
    }
}
