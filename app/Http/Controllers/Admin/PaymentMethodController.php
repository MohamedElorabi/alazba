<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $local = App()->getLocale();
        $payment_methods = PaymentMethod::select('id','name_'.$local.' as name', 'image' , 'available')->get();
        return view('admin.payment_methods.index', compact('payment_methods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.payment_methods.create');
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
        Session::flash('success','Created successfully!');
        return redirect(route('payment_methods'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment_method = PaymentMethod::find($id);
        return view('admin.payment_methods.show', compact('payment_method'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment_method = PaymentMethod::find($id);
        return view('admin.payment_methods.edit', compact('payment_method'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payment_method = PaymentMethod::find($id);
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

        Session::flash('success','Updated successfully!');
        return redirect(route('users'))->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment_method = PaymentMethod::findOrFail($id);
        $payment_method->delete();

        Session::flash('success','Deleted successfully!');
        return redirect(route('payment_methods'));
    }
}
