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
        if ($request->hasFile('file')) {

            foreach ($request->file('file') as $image) {

                $file_name = rand() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/property_documents',$file_name);
                $imageName = $file_name;

                PropertyDocument::create([
                    'name' => $request->name,
                    'file' =>  $imageName,
                    'expiry_date' => $request->expiry_date,
                    'property_id' => $request->property_id,
                ]);
            }
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
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'expiry_date' => 'date',
            'file' => 'file|mimes:jpeg,png,pdf' // Add validation rules for the file
            // Add validation rules for other fields here
        ]);

        // Find the property record you want to update
        $property = PropertyDocument::findOrFail($id);

        // Delete the old file if it exists
        if ($property->file) {
            Storage::delete('public/property_documents/' . $property->file);
        }

        // Store the new file if provided
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = rand() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/property_documents', $file_name);
            $imageName = $file_name;
        } else {
            $imageName = $property->file; // Keep the existing file name if no new file is provided
        }

        // Update the properties of the model
        $property->name = $validatedData['name'];
        $property->expiry_date = $validatedData['expiry_date'];
        $property->file = $imageName;
        // Update other fields here

        // Save the changes to the database
        $property->save();

        return response()->json([
            'status' => true,
            'message' => 'Data Updated Successfully.',
        ]);
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
