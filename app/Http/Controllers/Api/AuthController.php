<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{



    public function register(Request $request)
    {

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $file_name = rand() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/users',$file_name);
            $imageName = $file_name;
        }
        $user = User::create([
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

        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);


    }



    public function login(Request $request)
    {

            if(!Auth::attempt($request->only(['phone', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Phone & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('phone', $request->phone)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

    }



    public function logout(Request $request)
    {
            $user = Auth::user();
            if ($user) {
                PersonalAccessToken::where('tokenable_id', $user->id)
                    ->where('tokenable_type', get_class($user))
                    ->where('name', 'API TOKEN')
                    ->delete();
                return response()->json(['message' => 'logged out successfully']);
            } else {
                return response()->json(['message' => 'not authenticated'], 401);
            }
    }
}
