<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
{
    $user = User::create([
        "name" => $request->name,
        "email" => $request->email,
        "password" => Hash::make($request->password),
    ]);

    return response()->json([
        "user" => $user
    ]);
}

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only("email", "password"))) {
            return response()->json([
                "message" => "invalid data"
            ], 401);
        }

        return response()->json([
            "user" => Auth::user()
        ]);
    }


    public function profile(Request $request)
    {
        return response()->json(
            $request->user()
        );
    }
}
