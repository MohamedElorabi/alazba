<?php

namespace App\Http\Controllers\Admin;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
