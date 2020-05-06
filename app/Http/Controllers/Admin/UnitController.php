<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UnitRequest;
use Illuminate\Support\Facades\Auth;
use App\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::all();
        return view('admin.unit.list', compact('unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $request)
    {
       $user = Auth::user();
        $data = [
            'name' => $request->input('name'),
            'descripation' => $request->input('descripation'),
            'status' => $request->input('published'),
            'created_by' => $user->id,
        ];
        Unit::create($data);
        session()->flash('message', 'Unit Create Successfully');
        session()->flash('type', 'success');
        return redirect('admin/unit');
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
        $unit = Unit::find($id);
        return view('admin.unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnitRequest $request, $id)
    {
        $user = Auth::user();
        $unit =Unit::find($id);
        $data = [
            'name' => $request->input('name'),
            'descripation' => $request->input('descripation'),
            'status' => $request->input('published'),
            'created_by' => $user->id,
        ];
        $unit->update($data);
        session()->flash('message', 'Unit Update Successfully');
        session()->flash('type', 'success');
        return redirect('admin/unit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = Unit::find($id);
        $unit->delete();
        session()->flash('message', 'Unit Delete Successfully');
        session()->flash('type', 'success');
        return redirect('admin/unit');

    }
}
