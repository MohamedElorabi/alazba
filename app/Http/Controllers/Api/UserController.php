<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Contract;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use App\Models\UserDocument;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        if(count($user) > 0 )
        {
            return response()->json([
                'data' => $user
            ]);
        }
        return response()->json([
            'message' => 'no record found'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $file_name = rand() . '.' . $image->getClientOriginalName();
            $path = $image->storeAs('public/users',$file_name);
            $imageName = $file_name;
        }

        $data = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'passport_id' => $request->passport_id,
            'nationalty' => $request->nationalty,
            'image' => $imageName,
            'status' => $request->status,
            'type' => $request->type,
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
        $user = User::findOrFail($id);
        if($user)
        {
            return response()->json([
                'status' => true,
                'data' => $user,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'message' => 'no record found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $country = User::findOrFail($id);

        if($country)
        {

            $data = [
                'name' => $request->name,
                'phone' => $request->phone,
                'passport_id' => $request->passport_id,
                'nationalty' => $request->nationalty,
                'status' => $request->status,
                'type' => $request->type,
                'company_id' => auth()->user()->company->id,
            ];


            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $file_name = rand() . '.' . $image->getClientOriginalExtension();
                if($country->image)
                {
                    Storage::delete('public/users/' . $country->image);
                }
                $path = $image->storeAs('public/users',$file_name);

                $country['image'] = $file_name;

            }

            $country->update($request->except('image'));
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
        $user = User::findOrFail($id);
        if ($user->image) {
            Storage::delete($user->image);
        }
        $user->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully.',
        ]);
    }



    // user contracts
    public function user_contracts()
    {
        $user_contract = Contract::where('user_id', auth()->user()->id)->get();
        if($user_contract->count() > 0)
        {
            return response()->json([
                'status' => true,
                'data' => $user_contract,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'message' => 'Not Found Contracts By This User.',
            ]);
        }
    }




        // user requests
        public function user_requests()
        {
            $user_requests = ModelsRequest::where('user_id', auth()->user()->id)->get();
            if($user_requests->count() > 0)
            {
                return response()->json([
                    'status' => true,
                    'data' => $user_requests,
                ]);

            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Not Found Requests By This User.',
                ]);
            }
        }



        // user documents
        public function user_documents()
        {
            $user_documents = UserDocument::where('user_id', auth()->user()->id)->get();
            if($user_documents->count() > 0)
            {
                return response()->json([
                    'status' => true,
                    'data' => $user_documents,
                ]);

            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Not Found Documents By This User.',
                ]);
            }
        }


}
