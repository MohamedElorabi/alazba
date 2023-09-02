<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FlatRequest;
use App\Models\Flat;
use App\Models\Property;
use Illuminate\Http\Request;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flats = Flat::all();
        return view('admin.flats.index', compact('flats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $properties = Property::all();
        return view('admin.flats.create', compact('properties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FlatRequest $request)
    {
        $data = Flat::create([
            'property_id' => $request->property_id,
            'floor_number' => $request->floor_number,
            'distance' => $request->distance,
            'rent_amount' => $request->rent_amount,
        ]);


        return redirect(route('flats'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $flat = Flat::findOrFail($id);
        $properties = Property::all();
        return view('admin.flats.edit', compact('flat','properties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FlatRequest $request, string $id)
    {
        $flat = Flat::findOrFail($id);
        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'floors_count' => $request->floors_count,
        ];

        $flat->update($data);

        return redirect(route('flats'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flat = Flat::findOrFail($id);
        $flat->delete();
        return redirect(route('flats'));
    }
}
