<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::select('id', 'user_id', 'total', 'paid', 'debit', 'status', 'date', 'expiry_date', 'payment_method_id')->with('invoice_items')->get();
        if(count($invoices) > 0 )
        {
            return response()->json([
                'data' => $invoices
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
        // dd($request->all());
        $invoice = new Invoice();
        $invoice->user_id = auth()->user()->id;
        $invoice->total = $request->total;
        $invoice->paid = $request->paid;
        $invoice->debit = $request->debit;
        $invoice->status = $request->status;
        $invoice->date = $request->date;
        $invoice->expiry_date = $request->expiry_date;
        $invoice->payment_method_id = $request->payment_method_id;
        $invoice->company_id = $request->company_id;
        $invoice->save();

        $itemIds = json_decode($request->object_id, true);
        $itemPrices = json_decode($request->price, true);
        $types = json_decode($request->type, true);

        for ($index = 0; $index < count($itemIds); $index++) {
            if ($types[$index] == 'contract') {
                $item = Contract::findOrFail($itemIds[$index]);
            } else {
                $item = ModelsRequest::findOrFail($itemIds[$index]);
            }

            // Create an invoice item
            $invoiceItem = new InvoiceItem();
            $invoiceItem->invoice_id = $invoice->id;
            $invoiceItem->price = $itemPrices[$index];
            $invoiceItem->type = $types[$index];
            $invoiceItem->object()->associate($item);
            $invoiceItem->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Invoice Created Successfully.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::with('invoice_items')->find($id);
        if($invoice)
        {
            return response()->json([
                'status' => true,
                'data' => $invoice,
            ]);

        }else {
            return response()->json([
                'status' => false,
                'message' => 'Id Not Found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $invoice = Invoice::findOrFail($id);

        $invoice->total = $request->total;
        $invoice->paid = $request->paid;
        $invoice->debit = $request->debit;
        $invoice->status = $request->status;
        $invoice->date = $request->date;
        $invoice->expiry_date = $request->expiry_date;
        $invoice->payment_method_id = $request->payment_method_id;
        $invoice->company_id = $request->company_id;

        $invoice->save();


        $itemIds = json_decode($request->object_id, true);
        $itemPrices = json_decode($request->price, true);
        $types = json_decode($request->type, true);

        for ($index = 0; $index < count($itemIds); $index++) {
            if ($types[$index] == 'contract') {
                $item = Contract::findOrFail($itemIds[$index]);
            } else {
                $item = ModelsRequest::findOrFail($itemIds[$index]);
            }


            $invoiceItem = InvoiceItem::where('invoice_id', $invoice->id)
            ->where('type', $types[$index])
            ->where('object_id', $itemIds[$index])
            ->first();

        if ($invoiceItem) {
            $invoiceItem->price = $itemPrices[$index];
            $invoiceItem->save();
        }
    }
        return response()->json([
            'status' => true,
            'message' => 'Invoice Updated Successfully.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully.',
        ]);
    }
}
