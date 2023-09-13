<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDocumentRequest;
use App\Models\UserDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_documents  = UserDocument::all();
        if(count($user_documents) > 0 )
        {
            return response()->json([
                'data' => $user_documents
            ]);
        }
        return response()->json([
            'message' => 'no record found'
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(UserDocumentRequest $request)
    {
        $name = json_decode($request->name);
        $type = json_decode($request->type);
        $expiry_date = json_decode($request->expiry_date);
        $user_id = json_decode($request->user_id);

        foreach ($name as $key => $value) {
            $userDocument = new UserDocument();
            $userDocument->name = $value;
            $userDocument->type = $type[$key];
            $userDocument->expiry_date = $expiry_date[$key];
            $userDocument->user_id = $user_id;

            if ($request->hasFile('file.' . $key)) {
                $file = $request->file('file.' . $key);
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/user_documents',$fileName);
                $userDocument->file = $fileName;
            }

            $userDocument->save();
        }

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
        $userDocument = UserDocument::find($id);
        if($userDocument)
        {
            return response()->json([
                'status' => true,
                'data' => $userDocument,
            ]);
        }

        return response()->json([
            'message' => 'Id Not Found.',
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UserDocumentRequest $request, string $id)
    {
        $userDocument = UserDocument::find($id);

        if($userDocument){
            $data = [
                'name' => $request->name,
                'type' => $request->type,
                'expiry_date' => $request->expiry_date,
                'user_id' => $request->user_id,
            ];

            if($request->hasFile('file'))
            {
                $file = $request->file('file');
                $file_name = rand() . '.' . $file->getClientOriginalExtension();
                if($userDocument->file)
                {
                    Storage::delete('public/user_documents/' . $userDocument->file);
                }
                $path = $file->storeAs('public/user_documents',$file_name);

                $userDocument['file'] = $file_name;

            }


            $userDocument->update($request->except('file'));
            return response()->json([
                'status' => true,
                'message' => 'Data Updated Successfully.',
            ]);

        } else {
            return response()->json([
                'message' => 'Id Not Found',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_document = UserDocument::findOrFail($id);
        if ($user_document->image) {
            Storage::delete($user_document->image);
        }
        $user_document->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully.',
        ]);
    }
}
