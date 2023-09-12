<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment_methods = PaymentMethod::all();

        if(count($payment_methods) > 0 )
        {
            return response()->json([
                'data' => $payment_methods
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
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $file_name = rand() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/payment_methods',$file_name);
            $imageName = $file_name;
        }

         PaymentMethod::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'image' => $imageName,
            'available' => $request->available,
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payment_method = PaymentMethod::find($id);
        if($payment_method)
        {

            $data = [
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'available' => $request->available,
            ];
    
    
            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $file_name = rand() . '.' . $image->getClientOriginalExtension();
                if($payment_method->image)
                {
                    Storage::delete('public/payment_methods/' . $payment_method->image);
                }
                $path = $image->storeAs('public/payment_methods',$file_name);
    
                $payment_method['image'] = $file_name;
    
            }
    
            $payment_method->update($request->except('image'));

            return response()->json([
                'status' => true,
                'data' => $data,
                'message' => 'Data Updated Successfully.',
            ]);

        } else{
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
        $payment_method = PaymentMethod::findOrFail($id);
        if($payment_method) {
            $payment_method->delete();
            return response()->json([
                'status' => true,
                'message' => 'Data Deleted Successfully.',
            ]);
        } else {

            return response()->json([
                'message' => 'Id not found',
            ], 404);
        }
    }
}
