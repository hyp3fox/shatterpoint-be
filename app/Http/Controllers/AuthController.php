<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    // Register new users
   public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required|string|max:255',
            'username'     => 'required|string|max:255|unique:users',
            'email'        => 'required|string|email|max:255|unique:users',
            'phone_number' => 'nullable|string|max:20',
            'password'     => 'required|string|min:6',
            'color_scheme_id' => 'required|integer|min:0|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // generate unique 10-digit id
        do {
            $id = random_int(1000000000, 9999999999); // 10 digits
        } while (User::where('id', $id)->exists());

        $user = User::create([
            'id'           => $id,
            'name'         => $request->name,
            'username'     => $request->username,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'password'     => Hash::make($request->password),
            'color_scheme_id' => $request->color_scheme_id,
            'is_activated'    => 1,
            'is_admin'        => 1,
            'user_role'       => 'user'
        ]);


        return response()->json([
            'message' => 'User registered successfully',
            'user'    => $user,
        ]);
    }


    // Login existing users
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out']);
    }
}
