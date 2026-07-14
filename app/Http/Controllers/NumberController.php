<?php

namespace App\Http\Controllers;

use App\Models\Number;

class NumberController extends Controller
{
    public function index()
    {
        $numbers = Number::all();

        return response()->json($numbers);
    }
}
