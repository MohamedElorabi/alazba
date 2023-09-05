<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDocumentRequest;
use App\Models\User;
use App\Models\UserDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_documents = UserDocument::all();
        return view('admin.userDocuments.index', compact('user_documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.userDocuments.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $documentsData = $request->validate([
            'name.*' => 'required|string|max:255',
            'file.*' => 'required|file|max:2048',
            'type.*' => 'required|string',
            'expiry_date.*' => 'required|date',
            'user_id' => 'required',
        ]);

        foreach ($documentsData['name'] as $key => $name) {
            $userDocument = new UserDocument();
            $userDocument->name = $name;
            $userDocument->type = $documentsData['type'][$key];
            $userDocument->expiry_date = $documentsData['expiry_date'][$key];
            $userDocument->user_id = $documentsData['user_id'];

            if ($request->hasFile('file.' . $key)) {
                $file = $request->file('file.' . $key);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/user_documents',$fileName);
                $userDocument->file = $fileName;
            }

            $userDocument->save();
        }

        Session::flash('success','Created successfully!');

        return redirect()->route('user_documents');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
        $user_document = UserDocument::findOrFail($id);
        $user_document->delete();
        return redirect(route('user_documents'));
    }
}
