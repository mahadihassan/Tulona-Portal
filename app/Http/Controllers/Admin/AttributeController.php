<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\AttributeGroup;
use App\Unit;
use App\Attribute;
use Illuminate\Support\Facades\Auth;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attribute = Attribute::all();
        return view('admin.attribute.list', compact('attribute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributeGroup = AttributeGroup::all();
        return view('admin.attribute.create', compact('attributeGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        $user = Auth::user();
        $attribute = new Attribute;
        $attribute->name = $request->input('name');
        $attribute->attribute_group_id = $request->input('attribute_group_id');
        $attribute->descripation = $request->input('descripation');
        $attribute->status = $request->input('published');
        $attribute->created_by = $user->id;
        $attribute->save();
        session()->flash('message', 'Attribute Create Successfully');
        return redirect('admin/attributes');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attributeGroup = AttributeGroup::all();
        $attribute = Attribute::find($id);
        return view('admin.attribute.edit', compact('attribute', 'attributeGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, $id)
    {
        $user = Auth::user();
        $attribute =Attribute::find($id);
        $attribute->name = $request->input('name');
        $attribute->attribute_group_id = $request->input('attribute_group_id');
        $attribute->descripation = $request->input('descripation');
        $attribute->status = $request->input('published');
        $attribute->created_by = $user->id;
        $attribute->save();
        session()->flash('message', 'Attribute Update Successfully');
        return redirect('admin/attributes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Attribute::find($id);
        $attribute->delete();
        session()->flash('message', 'Attribute Delete Successfully');
        return redirect('admin/attributes');
    }
}
