<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use app\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'EMAIL_ADD' => 'required|email',
            'USER_ID' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Authentication passed
        Auth::login($user); // Optional: Log in the user if you are using sessions
        return response()->json(['message' => 'Login successful'], 200);
    
    }
}


