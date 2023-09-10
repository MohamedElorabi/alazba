<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Notification;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller
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
       // dd($request->all());
        $user = json_decode($request->user_id, true);;
        $itemIds = json_decode($request->object_id, true);
        $title_ar = json_decode($request->title_ar, true);
        $title_en = json_decode($request->title_en, true);
        $description_ar = json_decode($request->description_ar, true);
        $description_en = json_decode($request->description_en, true);
        $types = json_decode($request->type, true);

        for ($index = 0; $index < count($itemIds); $index++) {
            if ($types[$index] == 'contract') {
                $item = Contract::findOrFail($itemIds[$index]);
            } else {
                $item = ModelsRequest::findOrFail($itemIds[$index]);
            }

            $invoiceItem = new Notification();
            $invoiceItem->user_id = $user[$index];
            $invoiceItem->object()->associate($item);
            $invoiceItem->title_ar = $title_ar[$index];
            $invoiceItem->title_en = $title_en[$index];
            $invoiceItem->description_ar = $description_ar[$index];
            $invoiceItem->description_en = $description_en[$index];
            $invoiceItem->type = $types[$index];
            $invoiceItem->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Notification Created Successfully.',
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
        $notification = Notification::findOrFail($id);
        $notification->delete();

        Session::flash('success','Deleted successfully!');
        return redirect(route('notifications'));
    }
}
