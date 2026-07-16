<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller {
  private UserService $userService;

  public function __construct(UserService $userService) {
    $this->userService = $userService;
  }

  public function register(Request $request) {
    $data = $request->validate([
      "name"=>"required",
      "email"=>"required|email",
      "password"=>"required"
    ]);

    $user = $this->userService->register($data);

    return response()->json([
      "user"=>$user
    ]);
  }
  
  public function login(Request $request){
    $credentials = $request->validate([
      "email" => "required|email",
      "password" => "required"
    ]);

    $data = $this->userService->login($credentials);

    if(!$data) {
      return response()->json([
        "message" => "Invalid data!"
      ], 401);
    }

    return response()->json([
      "user" => $data["user"],
      "token" => $data["token"]
    ]);
  }
    
  public function profile(Request $request) {
    return response()->json(
      $request->user()
    );
  }
}
