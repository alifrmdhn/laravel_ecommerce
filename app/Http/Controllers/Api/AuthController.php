<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function registerUser(Request $request) {

        $validateUser = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        if($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => "Error Create a user",
                'error' => $validateUser->errors()
            ],401);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => true,
            'message' => "User Created successfully",
            'token' => $user->createToken('token')->plainTextToken
        ],200);

    }

    public function loginUser(Request $request) {

        $validateUser = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => "Error validation",
                'error' => $validateUser->errors()
            ],401);
        }


        if (!Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return response()->json([
                'status' => false,
                'message' => "Email and password not matched"
            ], 401);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'status' => true,
            'message' => "User Login successfully",
            'token' => $user->createToken('token')->plainTextToken
        ], 200);

    }
}
