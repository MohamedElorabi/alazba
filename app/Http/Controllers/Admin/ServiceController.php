<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $local = App()->getLocale();
        $services = Service::select('id','name_'.$local.' as name', 'image')->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
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

        Session::flash('success','Created successfully!');

        return redirect(route('services'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, string $id)
    {
        $service = Service::findOrFail($id);
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

            Session::flash('success','Updated successfully!');

            return redirect(route('services'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect(route('services'));
    }
}
