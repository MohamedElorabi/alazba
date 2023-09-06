<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyDocumentRequest;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use App\Models\PropertyDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PropertyDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $property_documents  = PropertyDocument::all();
        return view('admin.propertyDocuments.index', compact('property_documents'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $properties = Property::all();
        return view('admin.propertyDocuments.create',compact('properties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $documentsData = $request->validate([
            'name.*' => 'required|string|max:255',
            'file.*' => 'required|file|max:2048',
            'expiry_date.*' => 'required|date',
            'property_id' => 'required',
        ]);

        foreach ($documentsData['name'] as $key => $name) {
            $propertyDocument = new PropertyDocument();
            $propertyDocument->name = $name;
            $propertyDocument->expiry_date = $documentsData['expiry_date'][$key];
            $propertyDocument->property_id = $documentsData['property_id'];

            if ($request->hasFile('file.' . $key)) {
                $file = $request->file('file.' . $key);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/property_documents',$fileName);
                $propertyDocument->file = $fileName;
            }

            $propertyDocument->save();
        }

        Session::flash('success','Created successfully!');

        return redirect()->route('property_documents');


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
