<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // LOGIN
    public function login(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required',
            ]);


            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'error' => $validator->errors(),
                ], 401);
            }

            if (!Auth::attempt($request->only('username', 'password'))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Username and Password does not match with our records',
                ], 401);
            }

            $user = User::where('username', $request->username,)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("api_token")->plainTextToken,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    // REGISTER
    public function register(Request $request)
    {

        $validateUser = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:20|min:4',
                'email' => 'required|email|unique:users,email',
                'username' => 'required|unique:users,username',
                'password' => 'required|min:8',
                'c_password' => 'required|same:password',

            ]
        );

        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validateUser->errors(),
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);


        return response()->json([
            'status' => true,
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'username' => $user->username,
            ],
            'email_verified_at' => $user->email_verified_at,
            'message' => 'User Created Successfully',
            'token' => $user->createToken("api_token")->plainTextToken,
        ], 200);
    }



    // GET USER
    public function show()
    {
        $user = auth()->user();

        if ($user->email_verified_at == null) {
            return response()->json([
                'status' => false,
                'email_verified_at' => $user->email_verified_at,
                'message' => 'Email not verified',
            ], 401);
        } else {
            return response()->json([
                'status' => true,
                'user' => [
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,
                ],
                'email_verified_at' => $user->email_verified_at,
                'message' => 'User Login Details',
            ], 200);
        }
    }


    // public function logout()
    // {
    //     Auth::user()->tokens()->delete();
    //     return response()->json([
    //         'message' => 'logout success'
    //     ]);
    // }
}
