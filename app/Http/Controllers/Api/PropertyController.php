<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::all();

        if(count($properties) > 0 )
        {
            return response()->json([
                'data' => $properties
            ]);
        }
        return response()->json([
            'message' => 'no record found'
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
        $data = Property::create([
            'name' => $request->name,
            'address' => $request->address,
            'floors_count' => $request->floors_count,
            'user_id' => auth()->user()->id,
            'company_id' => auth()->user()->company->id,

        ]);


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
        $property = Property::find($id);
        if($property)
        {
            return response()->json([
                'status' => true,
                'data' => $property,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'message' => 'ID Not Found.',
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, string $id)
    {
        $property = Property::find($id);
        if($property)
        {
            $data = [
                'name' => $request->name,
                'address' => $request->address,
                'floors_count' => $request->floors_count,
                'user_id' => auth()->user()->id,
                'company_id' => auth()->user()->company->id,
            ];

            $property->update($data);

            return response()->json([
                'status' => true,
                'data' => $data,
                'message' => 'Data Updated Successfully.',
            ]);

        } else {
            return response()->json([
                'status' => false,
                'message' => 'ID Not Found.',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::findOrFail($id);
        if($property)
        {
            $property->delete();
            return response()->json([
                'status' => true,
                'message' => 'Data Deleted Successfully.',
            ]);

        } else {
            return response()->json([
                'status' => false,
                'message' => 'ID Not Found.',
            ]);
        }
    }
}
