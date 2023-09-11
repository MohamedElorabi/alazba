<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        if(count($companies) > 0 )
        {
            return response()->json([
                'data' => $companies
            ]);
        }
        return response()->json([
            'message' => 'no record found'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        return response()->json([
            'message' => 'Data Created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id);
        if($company)
        {
            return response()->json([
                'data' => $company
            ]);
        }

        return response()->json([
            'message' => 'Id Not Found'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);
        if($company)
        {
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

            return response()->json([
                'message' => 'Data Updated Successfully'
            ]);
        }

        return response()->json([
            'message' => 'Id Not Found'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully.',
        ]);
    }
}
