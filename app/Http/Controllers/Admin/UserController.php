<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin.users.create', compact('companies'));
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
            $path = $image->storeAs('public/users',$file_name);
            $imageName = $file_name;
        }

         User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'passport_id' => $request->passport_id,
            'nationalty' => $request->nationalty,
            'image' => $imageName,
            'status' => $request->status,
            'type' => $request->type,
            'company_id' => $request->company_id,
        ]);
        Session::flash('success','Created successfully!');
        return redirect(route('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('user_document')->find($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $company = Company::all();
        return view('admin.users.edit', compact('user', 'company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);
            $data = [
                'name' => $request->name,
                'phone' => $request->phone,
                'passport_id' => $request->passport_id,
                'nationalty' => $request->nationalty,
                'status' => $request->status,
                'type' => $request->type,
                'company_id' => $request->company_id,
            ];


            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $file_name = rand() . '.' . $image->getClientOriginalExtension();
                if($user->image)
                {
                    Storage::delete('public/users/' . $user->image);
                }
                $path = $image->storeAs('public/users',$file_name);

                $user['image'] = $file_name;

            }

            $user->update($request->except('image'));

            Session::flash('success','Updated successfully!');
            return redirect(route('users'))->with('success', 'Updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('success','Deleted successfully!');
        return redirect(route('users'))->with('success', 'Deleted successfully!');;
    }
}
