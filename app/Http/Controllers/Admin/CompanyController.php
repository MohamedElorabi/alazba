<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        if($request->hasFile('logo'))
        {
            $logo = $request->file('logo');
            $file_name = rand() . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('public/companies',$file_name);
            $imageName = $file_name;
        }

         Company::create([
            'name' => $request->name,
            'logo'=> $imageName,

        ]);
        Session::flash('success','Created successfully!');
        return redirect(route('companies'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::findOrFail($id);
        return view('admin.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(CompanyRequest $request, string $id)
    {
        $company = Company::findOrFail($id);
        $data = [
            'name' => $request->name,
        ];


        if($request->hasFile('logo'))
        {
            $logo = $request->file('logo');
            $file_name = rand() . '.' . $logo->getClientOriginalExtension();
            if($company->logo)
            {
                Storage::delete('public/companies/' . $company->logo);
            }
            $path = $logo->storeAs('public/companies',$file_name);

            $company['logo'] = $file_name;

        }

        $company->update($request->except('logo'));

        Session::flash('success','Updated successfully!');

        return redirect(route('companies'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        Session::flash('success','Deleted successfully!');
        return redirect(route('companies'));
    }
}
