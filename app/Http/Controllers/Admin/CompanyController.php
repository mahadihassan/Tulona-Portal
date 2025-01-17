<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Company;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
        return view('admin.company.list',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $user = Auth::user();
        $company = new Company;
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');
        $company->website_link = $request->input('website_link');
        if($file = $request->file('image'))
        {
            $name = rand().$file->getClientOriginalName();
            $file->move(public_path('Image/Company'), $name);
            $company->logo = $name;
        }
        $company->address = $request->input('address');
        $company->descripation = $request->input('descripation');
        $company->created_by = $user->id;
        $company->save();
        session()->flash('message', 'Company Create Successfully');
        return redirect('admin/company');
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
        $company = Company::find($id);
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $user = Auth::user();
        $company = Company::find($id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');
        $company->website_link = $request->input('website_link');
        if($file = $request->file('image'))
        {
            $name = "";
            $album = $company->logo;
            $filename = public_path() . '/Image/Company/' . $album;
            \File::delete($filename);
            $name = rand().$file->getClientOriginalName();
            $file->move(public_path('Image/Company'), $name);
            $company->logo = $name;
        }
        $company->address = $request->input('address');
        $company->descripation = $request->input('descripation');
        $company->updated_by = $user->id;
        $company->save();
        session()->flash('message', 'Company Update Successfully');
        return redirect('admin/company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $album = $company->logo;
        $filename = public_path() . '/Image/Company/' . $album;
        \File::delete($filename);
        $company->delete();
        session()->flash('message', 'Company Delete Successfully');
        return redirect('admin/company');
    }
}
