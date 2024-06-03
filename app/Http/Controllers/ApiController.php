<?php

namespace App\Http\Controllers;

use App\Models\api;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'api::all()';
    }

    public function getData()
    {
        // $data = api::all();
        // return response()->json($data);
        return 'Welcome to your Laravel API!';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function login(Request $request)
    {

        // return $request;
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json(['access_token' => $token, 'User_ID' => $user->id, 'user_name' => $user->name], 200);
        } else {
            return response()->json(['error' => 'Invalid Email or Password'], 401);
        }

        // $rules = [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ];


        // $validator = Validator::make($request->all(), $rules);

        // // if ($validator->fails()) {
        // //     return response()->json(['data' => $validator->errors()], 422);
        // // }
        // if ($validator->fails()) {
        //     return response()->json(['data' => 'You must enter email or password'], 422);
        // }
        // $user = User::where('email', $request->email)->first();

        // if ($user && Hash::check($request->password, $user->password)) {
        //     // Login successful, proceed with desired actions
        //     $token = $user->createToken('authToken')->plainTextToken;

        //     return response()->json([
        //         'user_name' => $user->name,
        //         'access_token' => $token,
        //         'token_type' => 'Bearer',
        //         // 'request password' => Hash::make($request->password),

        //         // 'user password' => Hash::make($user->password),
        //     ]);
        // } else {
        //     // Invalid credentials, handle the error
        //     return response()->json([
        //         'data' => 'Email or Password is not Correct',
        //         // 'password' => Hash::make($request->password),
        //     ]);
        // }

    }

    // public function logout(Request $request)
    // {
    //     // $request->user()->currentAccessToken()->delete();

    //     // return response()->json(['message' => 'Logout successful'], 200);
    //     // return $request;
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $user = Auth::user();
    //         $user->tokens()->delete();

    //         return response()->json(['message' => 'Logout successful'], 200);

    //     } else {
    //         return response()->json(['error' => 'Unauthenticated'], 401);
    //     }

    // }

    // public function logout()
    // {
    //     // Revoke the current user's access token
    //     $user = Auth::user();
    //     $user->tokens()->delete();

    //     return response()->json(['message' => 'Logout successful'], 200);
    // }
    public function logout()
    {
        // $user = Auth::user();

        // return $user;
        try {
            $user = Auth::user();
            $token = $user->currentAccessToken()->delete();

            if ($token) {
                return response()->json(['message' => 'Logout successful'], 200);

            } else {
                return response()->json(['error' => 'Unauthenticated'], 401);
            }
        } catch (\Exception $e) {
            // Exception handling code

            // Log the exception
            Log::error($e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(api $api)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(api $api)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, api $api)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(api $api)
    {
        //
    }
}