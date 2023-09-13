<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestRequest;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = ModelsRequest::all();

        if(count($requests) > 0 )
        {
            return response()->json([
                'data' => $requests
            ]);
        }
        return response()->json([
            'message' => 'no record found'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestRequest $request)
    {
        ModelsRequest::create([
            'user_id' => auth()->user()->id,
            'flat_id' => $request->flat_id,
            'service_id' => $request->service_id,
            'date' => $request->date,
            'status' => $request->status,
            'company_id' => auth()->user()->company->id,
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
        $request = ModelsRequest::find($id);
        if($request)
        {
            return response()->json([
                'status' => true,
                'data' => $request,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'message' => 'ID Not Found.',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestRequest $request, string $id)
    {
        $item = ModelsRequest::find($id);
        if($item)
        {
            $data = [
                'user_id' => auth()->user()->id,
                'flat_id' => $request->flat_id,
                'service_id' => $request->service_id,
                'date' => $request->date,
                'status' => $request->status,
                'company_id' => auth()->user()->company->id,
            ];

            $item->update($data);

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
        $request = ModelsRequest::findOrFail($id);
        if($request)
        {
            $request->delete();
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
