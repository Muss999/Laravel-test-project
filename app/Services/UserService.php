<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService {
  public function register(array $data): User {
    return User::create([
      "name" => $data["name"],
      "email" => $data["email"],
      "password" => Hash::make($data["password"]),
    ]);
  } 

  public function login(array $data): ?array {
    if (!Auth::attempt($data)) {
      return null;
    }
    /** @var \App\Models\User $user */
    $user = Auth::user();
    $token = $user->createToken("auth_token")->plainTextToken;
    
    return [
      "user" => $user,
      "token" => $token
    ];
  }
}