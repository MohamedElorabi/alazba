<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Flat;
use App\Models\Request as ModelsRequest;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = ModelsRequest::all();
        return view('admin.requests.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $flats = Flat::all();
        $services = Service::all();
        return view('admin.requests.create', compact('users', 'flats', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ModelsRequest::create([
            'user_id' => $request->user_id,
            'flat_id' => $request->flat_id,
            'service_id' => $request->service_id,
            'date' => $request->date,
            'status' => $request->status,
        ]);


        return redirect(route('requests'));
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
        $item = ModelsRequest::find($id);
        $users = User::all();
        $flats = Flat::all();
        $services = Service::all();
        return view('admin.requests.edit', compact('item', 'users', 'flats', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = ModelsRequest::find($id);
        $data = [
            'user_id' => $request->user_id,
            'flat_id' => $request->flat_id,
            'service_id' => $request->service_id,
            'date' => $request->date,
            'status' => $request->status,
        ];


        $item->update($data);

        return redirect(route('requests'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $request = ModelsRequest::findOrFail($id);
        $request->delete();
        return redirect(route('requests'));
    }
}