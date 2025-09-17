<?php

namespace App\Helpers;

use App\Models\ApiLog;
use Illuminate\Database\Eloquent\Model;

class ApiLogHelper
{
    public static function store(int $type, string|null $user_id, string $ip, mixed $request): Model|ApiLog
    {
        return ApiLog::create([
            'user_id' => $user_id,
            'type' => $type,
            'ip' => $ip,
            'request' => json_encode($request),
        ]);
    }
}
