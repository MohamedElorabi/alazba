<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::all();
        if(count($contracts) > 0 )
        {
            return response()->json([
                'data' => $contracts
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
        $data = Contract::create([
            'user_id' => auth()->user()->id,
            'flat_id' => $request->flat_id,
            'property_id' => $request->property_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'amount' => $request->amount,
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
        $contract = Contract::find($id);
        if($contract)
        {
            return response()->json([
                'status' => true,
                'data' => $contract,
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
    public function update(Request $request, string $id)
    {
        $contract = Contract::findOrFail($id);
        if($contract)
        {
            $data = [
                'user_id' => auth()->user()->id,
                'flat_id' => $request->flat_id,
                'property_id' => $request->property_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status,
                'amount' => $request->amount,
                'company_id' => auth()->user()->company->id,
            ];
            $contract->update($data);
            return response()->json([
                'status' => true,
                'message' => 'Data Updated Successfully.',
            ]);
        } else {

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
        $contract = Contract::findOrFail($id);
        if($contract) {
            $contract->delete();
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
