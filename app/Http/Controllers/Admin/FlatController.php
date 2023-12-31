<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FlatRequest;
use App\Models\Flat;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
            'name' => $request->name,
            'property_id' => $request->property_id,
            'floor_number' => $request->floor_number,
            'distance' => $request->distance,
            'rent_amount' => $request->rent_amount,
        ]);

        Session::flash('success','Created successfully!');

        return redirect(route('flats'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $flat = Flat::findOrFail($id);
        $properties = Property::all();
        return view('admin.flats.show', compact('flat','properties'));
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
            'property_id' => $request->property_id,
            'floor_number' => $request->floor_number,
            'distance' => $request->distance,
            'rent_amount' => $request->rent_amount,
        ];

        $flat->update($data);

        Session::flash('success','Updated successfully!');

        return redirect(route('flats'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flat = Flat::findOrFail($id);
        $flat->delete();

        Session::flash('success','Deleted successfully!');
        return redirect(route('flats'));
    }
}
