<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ApiLog
 *
 * @version February 4, 2022, 11:49 pm +08
 *
 * @property string $type
 * @property string $ip
 * @property string $request
 * @property int $user_id
 */
class ApiLog extends Model
{
    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    public $table = 'api_logs';

    public $fillable = [
        'type',
        'ip',
        'request',
        'user_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'      => 'integer',
        'type'    => 'integer',
        'ip'      => 'string',
        'request' => 'string',
        'user_id' => 'string',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')
            ->withTrashed()
            ->withDefault([
                'name' => '-',
            ]);
    }
}
