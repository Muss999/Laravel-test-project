<?php

namespace App\Services;

use App\Models\Number;

class NumberService {
  public function getAll() {
    return Number::all();
  }

  public function generateNumber() {
    return Number::create([
      "value" => random_int(1, 100),
    ]);
  }
}