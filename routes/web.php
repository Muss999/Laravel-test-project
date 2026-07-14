<?php

use App\Http\Controllers\NumberController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'welcome')->name('home');

// Route::get("/", function () {
//   return view("numbers");
// });

Route::get("/numbersPage", function () {
    return Inertia::render('Numbers');
});



