<?php

namespace App\Http\Helpers;

use App\Models\Application\Log;
use Illuminate\Database\Eloquent\Model;

class ApplicationLogHelper
{
    public static function store(string $applicationId, int $fromStatus, int $toStatus, string|null $user_id, string|null $remarks): Model|ApplicationLog
    {
        return Log::create([
            'application_id' => $applicationId,
            'from_status_id' => $fromStatus,
            'to_status_id' => $toStatus,
            'created_by' => $user_id,
            'remarks' => $remarks,
        ]);
    }
}
