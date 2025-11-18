<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class LoggerHelper
{
    /**
     * Write custom log
     *
     * @param string $type Type of log, e.g., LOGIN_SUCCESS, LOGOUT, etc.
     * @param array $data Extra data to log
     */
    public static function write(string $type, array $data = [])
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        $caller = $backtrace[1] ?? [];

        $logData = [
            'type'      => $type,
            'class'     => $caller['class'] ?? null,
            'function'  => $caller['function'] ?? null,
            'ip'        => request()->ip(),
            'timestamp' => now()->toDateTimeString(),
        ];

        // Merge extra data
        $logData = array_merge($logData, $data);

        Log::info($type, $logData);
    }
}
