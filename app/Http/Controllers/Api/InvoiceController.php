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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $invoice = new Invoice();
        $invoice->user_id = auth()->user()->id;
        $invoice->total = $request->total;
        $invoice->paid = $request->paid;
        $invoice->debit = $request->debit;
        $invoice->status = $request->status;
        $invoice->date = $request->date;
        $invoice->payment_method_id = $request->payment_method_id;
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

            // Create an order item
            $invoiceItem = new InvoiceItem();
            $invoiceItem->invoice_id = $invoice->id;
            $invoiceItem->item_price = $itemPrices[$index];
            $invoiceItem->item()->associate($item);
            $invoiceItem->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Order Created Successfully.',
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
