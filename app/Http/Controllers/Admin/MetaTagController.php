<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Metatag;

class MetaTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metatag = Metatag::all();
        return view('admin.metatag.list', compact('metatag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.metatag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role =[
            'name'=> ['required','unique:metatags'],
        ];
        $customMessages = [
            'name.required' => 'Name field is required',
        ];
        $this->validate($request,$role, $customMessages);
        $metaname =$request->input('name');
        $name = strtolower($metaname);
        $user = Auth::user();
        $metatag = new Metatag;
        $metatag->name =$name;
        $metatag->descripation = $request->input('descripation');
        $metatag->status = $request->input('published');
        $metatag->created_by = $user->id;
        $metatag->save();
        session()->flash('message', 'Meta Tag Create Successfully');
        session()->flash('type', 'success');
        return redirect('admin/metatag');
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
        $metatag = Metatag::find($id);
        return view('admin.metatag.edit',compact('metatag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $role =[
            'name'=> ['required','unique:metatags'],
        ];
        $customMessages = [
            'name.required' => 'Name field is required',
        ];
        $this->validate($request,$role, $customMessages);
        $metaname =$request->input('name');
        $name = strtolower($metaname);
        $user = Auth::user();
        $metatag =Metatag::find($id);
        $metatag->name = $name;
        $metatag->descripation = $request->input('descripation');
        $metatag->status = $request->input('published');
        $metatag->updated_by = $user->id;
        $metatag->save();
        session()->flash('message', 'Meta Tag Update Successfully');
        session()->flash('type', 'success');
        return redirect('admin/metatag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $metatag = Metatag::find($id);
        $metatag->delete();
        session()->flash('message', 'Meta Tag Delete Successfully');
        session()->flash('type', 'success');
        return redirect('admin/metatag');
    }
}
