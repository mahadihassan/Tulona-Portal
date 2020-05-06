<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Brand;
use Illuminate\Support\Facades\Auth;


class BrandController extends Controller
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
        $brand = Brand::all();
        return view('admin.brand.list', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $user = Auth::user();
        $data = [
            'name' => $request->input('name'),
            'descripation' => $request->input('descripation'),
            'status' => $request->input('published'),
            'created_by' => $user->id,
        ];
        Brand::create($data);
        session()->flash('message', 'Brand Create Successfully');
        return redirect('admin/brand');
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
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        $user = Auth::user();
        $brand =Brand::find($id);
        $data = [
            'name' => $request->input('name'),
            'descripation' => $request->input('descripation'),
            'status' => $request->input('published'),
            'updated_by' => $user->id,
        ];
        $brand->update($data);
        session()->flash('message', 'Brand Update Successfully');
        return redirect('admin/brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        session()->flash('message', 'Brand Delete Successfully');
        return redirect('admin/brand');
    }
}
