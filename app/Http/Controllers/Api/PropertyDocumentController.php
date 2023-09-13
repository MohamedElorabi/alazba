<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PropertyDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $property_documents  = PropertyDocument::all();
        if(count($property_documents) > 0 )
        {
            return response()->json([
                'data' => $property_documents
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
        $name = json_decode($request->name);
        $expiry_date = json_decode($request->expiry_date);
        $property_id = json_decode($request->property_id);

        foreach ($name as $key => $value) {
            $propertyDocument = new PropertyDocument();
            $propertyDocument->name = $value;
            $propertyDocument->expiry_date = $expiry_date[$key];
            $propertyDocument->property_id = $property_id;

            if ($request->hasFile('file.' . $key)) {
                $file = $request->file('file.' . $key);
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/property_documents',$fileName);
                $propertyDocument->file = $fileName;
            }

            $propertyDocument->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Data Created Successfully.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $property_document = PropertyDocument::findOrFail($id);
        if($property_document)
        {
            return response()->json([
                'status' => true,
                'data' => $property_document,
            ]);

        }else {
            return response()->json([
                'status' => false,
                'message' => 'no record found',
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $propertyDocument = PropertyDocument::find($id);

        if($propertyDocument){

            $data = [
                'name' => $request->name,
                'expiry_date' => $request->expiry_date,
                'property_id' => $request->property_id,
            ];

            if($request->hasFile('file'))
            {
                $file = $request->file('file');
                $file_name = rand() . '.' . $file->getClientOriginalExtension();
                if($propertyDocument->file)
                {
                    Storage::delete('public/property_documents/' . $propertyDocument->file);
                }
                $path = $file->storeAs('public/property_documents',$file_name);

                $propertyDocument['file'] = $file_name;

            }


            $propertyDocument->update($request->except('file'));
            return response()->json([
                'status' => true,
                'message' => 'Data Updated Successfully.',
            ]);

        } else {
            return response()->json([
                'message' => 'Id Not Found',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property_document = PropertyDocument::findOrFail($id);
        if ($property_document->image) {
            Storage::delete($property_document->image);
        }
        $property_document->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully.',
        ]);
    }
}
