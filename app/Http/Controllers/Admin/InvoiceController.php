<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('admin.invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.invoices.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'total' => $request->total,
            'paid' => $request->paid,
            'debit' => $request->debit,
            'status' => $request->status,
            'date' => $request->date,
            'expiry_date' => $request->expiry_date,
            'payment_method_id' => $request->payment_method_id,
        ];
        Invoice::create($data);
        Session::flash('success','Created successfully!');
        return redirect(route('invoices'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::find($id);
        return view('admin.invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice = Invoice::find($id);
        $users = User::all();
        return view('admin.invoices.edit', compact('invoice','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $invoice = Invoice::find($id);

        $data = [
            'user_id' => $request->user_id,
            'total' => $request->total,
            'paid' => $request->paid,
            'debit' => $request->debit,
            'status' => $request->status,
            'date' => $request->date,
            'expiry_date' => $request->expiry_date,
            'payment_method_id' => $request->payment_method_id,
        ];

        $invoice->update($data);

        Session::flash('success','Updated successfully!');

        return redirect(route('invoices'));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        Session::flash('success','Deleted successfully!');
        return redirect(route('invoices'));
    }
}
