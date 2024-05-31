<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
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
        //
    }


        public function register(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            //    'role' => 'required',
        ]);

        $user = User::create([
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            //  'role' => $validated['role'],
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        $response =[
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
       $request->validate([
        'email'=>'required|email',
        'password'=>'required'
       ]);

       if(Auth::attempt($request->all())){
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken("API token for{$request->email}")->plainTextToken;



        return response()->json($token);
        
       }
       return response()->json('Invalid credentials');
    }

   public function logout(Request $request)
{
    // Ensure the request is coming from an authenticated user
    $user = $request->user();

    if ($user) {
        // Revoke all tokens for the authenticated user
        $user->tokens()->delete();

        return response()->json(['message' => 'Logout successfully'], 200);
    } else {
        return response()->json(['message' => 'No authenticated user found'], 401);
    }
}
}
