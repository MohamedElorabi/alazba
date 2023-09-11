<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContractRequest;
use App\Models\Company;
use App\Models\Contract;
use App\Models\Flat;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::all();
        return view('admin.contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $flats = Flat::all();
        $properties = Property::all();
        $companies = Company::all();
        return view('admin.contracts.create', compact('properties', 'flats', 'users', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContractRequest $request)
    {
        $data = Contract::create([
            'user_id' => $request->user_id,
            'flat_id' => $request->flat_id,
            'property_id' => $request->property_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'amount' => $request->amount,
            'company_id' => $request->company_id,
        ]);

        Session::flash('success','Created successfully!');
        return redirect(route('contracts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contract = Contract::findOrFail($id);
        $users = User::all();
        $flats = Flat::all();
        $properties = Property::all();
        $companies = Company::all();
        return view('admin.contracts.show', compact('contract','users','flats','companies','properties'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contract = Contract::findOrFail($id);
        $users = User::all();
        $flats = Flat::all();
        $properties = Property::all();
        $companies = Company::all();
        return view('admin.contracts.edit', compact('contract','users','flats','properties', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContractRequest $request, string $id)
    {
        $contract = Contract::findOrFail($id);
        $data = [
            'user_id' => $request->user_id,
            'flat_id' => $request->flat_id,
            'property_id' => $request->property_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'amount' => $request->amount,
            'company_id' => $request->company_id,
        ];

        $contract->update($data);

        Session::flash('success','Updated successfully!');

        return redirect(route('contract'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contract = Contract::findOrFail($id);
        $contract->delete();

        Session::flash('success','Deleted successfully!');
        return redirect(route('contracts'));
    }
}
