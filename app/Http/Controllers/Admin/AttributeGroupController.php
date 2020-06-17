<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeGroupRequest;
use Illuminate\Support\Facades\Auth;
use App\AttributeGroup;

class AttributeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributeGroup = AttributeGroup::all();
        return view('admin.attributeGroup.list',compact('attributeGroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attributeGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeGroupRequest $request)
    {
        $user = Auth::user();
        $attributeGroup = new AttributeGroup;
        $attributeGroup->name = $request->input('name');
        $attributeGroup->descripation = $request->input('descripation');
        $attributeGroup->status = $request->input('published');
        $attributeGroup->created_by = $user->id;
        $attributeGroup->save();
        session()->flash('message', 'AttributeGroup Create Successfully');
        return redirect('admin/attributegroups');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attributegroup = AttributeGroup::find($id);
        return view('admin.attributeGroup.edit', compact('attributegroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeGroupRequest $request, $id)
    {
        $user = Auth::user();
        $attributeGroup =AttributeGroup::find($id);
        $attributeGroup->name = $request->input('name');
        $attributeGroup->descripation = $request->input('descripation');
        $attributeGroup->status = $request->input('published');
        $attributeGroup->updated_by = $user->id;
        $attributeGroup->save();
        session()->flash('message', 'AttributeGroup Update Successfully');
        return redirect('admin/attributegroups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attributegroup = AttributeGroup::find($id);
        $attributegroup->delete();
        session()->flash('message', 'AttributeGroup Delete Successfully');
        return redirect('admin/attributegroups');
    }
}
