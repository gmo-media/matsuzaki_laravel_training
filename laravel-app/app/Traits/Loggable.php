<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait Loggable
{
    public function logInfo(string $message): void
    {
        Log::info($message);
    }

    public function logError(string $message): void
    {
        Log::error($message);
    }
}
