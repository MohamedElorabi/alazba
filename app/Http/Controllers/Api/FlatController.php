<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Flat;
use Illuminate\Http\Request;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flats = Flat::all();
        if(count($flats) > 0 )
        {
            return response()->json([
                'data' => $flats
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
        $data = Flat::create([
            'property_id' => $request->property_id,
            'floor_number' => $request->floor_number,
            'distance' => $request->distance,
            'rent_amount' => $request->rent_amount,
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
        $flat = Flat::find($id);
        if($flat)
        {
            return response()->json([
                'status' => true,
                'data' => $flat,
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
        $flat = Flat::findOrFail($id);

        if($flat)
        {

            $data = [
                'property_id' => $request->property_id,
                'floor_number' => $request->floor_number,
                'distance' => $request->distance,
                'rent_amount' => $request->rent_amount,
            ];

            $flat->update($request->except('image'));
            return response()->json([
                'status' => true,
                'message' => 'Data Updated Successfully.',
            ]);
        } else {

            return response()->json([
                'message' => 'Id not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flat = Flat::findOrFail($id);
        $flat->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully.',
        ]);
    }
}
