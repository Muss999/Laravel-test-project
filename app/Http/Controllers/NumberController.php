<?php

namespace App\Http\Controllers;

use App\Services\NumberService;

class NumberController extends Controller {
  private NumberService $numberService;

  public function __construct(NumberService $numberService) {
    $this->numberService = $numberService;
  }

  public function index() {
    $numbers = $this->numberService->getAll();
    return response()->json($numbers);
  }
}
