<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        if(count($services) > 0 )
        {
            return response()->json([
                'data' => $services
            ]);
        }
        return response()->json([
            'message' => 'no record found'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $file_name = rand() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/services',$file_name);
            $imageName = $file_name;
        }

         Service::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'image' => $imageName,
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
        $service = Service::find($id);
        if($service)
        {
            return response()->json([
                'status' => true,
                'data' => $service,
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
    public function update(ServiceRequest $request, string $id)
    {
        $service = Service::findOrFail($id);
        if($service){

            $data = [
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
            ];


            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $file_name = rand() . '.' . $image->getClientOriginalExtension();
                if($service->image)
                {
                    Storage::delete('public/services/' . $service->image);
                }
                $path = $image->storeAs('public/services',$file_name);

                $service['image'] = $file_name;

            }

            $service->update($request->except('image'));

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
        $service = Service::findOrFail($id);
        if($service)
        {
            $service->delete();
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
