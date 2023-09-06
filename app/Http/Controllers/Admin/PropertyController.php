<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::all();
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.properties.create');
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

        ]);

        Session::flash('success','Created successfully!');

        return redirect(route('properties'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $property = Property::with('property_document')->find($id);
        return view('admin.properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $property = Property::findOrFail($id);
        return view('admin.properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, string $id)
    {
        $property = Property::findOrFail($id);
        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'floors_count' => $request->floors_count,
        ];

        $property->update($data);

        Session::flash('success','Updated successfully!');

        return redirect(route('properties'));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        Session::flash('success','Deleted successfully!');

        return redirect(route('properties'));
    }
}
