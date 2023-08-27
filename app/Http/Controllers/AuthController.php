<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (!Auth::attempt($validatedData)) {
            return response()->json(["message" => "Unauthorized"], 401);
        }

        $user = User::where("email", $request->input("email"))->firstOrFail(); // Use input() method
        $token = $user->createToken("auth_token")->plainTextToken; // Use $user instead of User

        return response()
            ->son([
                "accessToken" => $token,
                "token_type" => "Bearer", 
                "user" => $user
            ]);
    }
}
