<?php

use App\Http\Controllers\NumberController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/numbers", [NumberController::class, "index"]);

Route::post("/register", [UserController::class, "register"]);

Route::post("/login", [UserController::class, "login"]);

Route::middleware("auth:sanctum")->get("/profile", [UserController::class, "profile"]);