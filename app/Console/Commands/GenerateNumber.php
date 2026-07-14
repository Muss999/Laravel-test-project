<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Number;

class GenerateNumber extends Command
{
    protected $signature = 'number:generate';

    protected $description = 'Generate random number';

    public function handle()
    {
        Number::create([
            'value' => random_int(1, 100),
        ]);

        return Command::SUCCESS;
    }
}