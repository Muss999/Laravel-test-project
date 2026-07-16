<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\NumberService;

class GenerateNumber extends Command {
    private NumberService $numberService;
    protected $signature = 'number:generate';
    protected $description = 'Generate random number';

    public function __construct(NumberService $numberService) {
        parent::__construct();

        $this->numberService = $numberService;
    }

    public function handle() {
        $this->numberService->generateNumber();

        return Command::SUCCESS;
    }
}