<?php

declare(strict_types=1);

namespace App\Models\Application;

use Eloquent as Model;
use App\Models\User;
use App\Models\Ref\Position;
use App\Models\Ref\Status;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Log extends Model
{
    use LogsActivity;

    protected static $logFillable = TRUE;

    public $table = 'application_logs';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'application_id',
        'from_status_id',
        'to_status_id',
        'created_by',
        'remarks'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'application_id' => 'string',
        'from_status_id' => 'integer',
        'to_status_id' => 'integer',
        'remarks' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
       
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fromStatus()
    {
        return $this->belongsTo(Status::class, 'from_status_id');
    }

    public function toStatus()
    {
        return $this->belongsTo(Status::class, 'to_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function creator()
    {
        return $this->belongsTo( User::class,'created_by');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
