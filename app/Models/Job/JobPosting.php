<?php

declare(strict_types=1);

namespace App\Models\Job;

use App\Models\Ref\Position;
use App\Models\Ref\Status;
use App\Models\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class JobPosting extends Model
{
    use HasUlids,
        LogsActivity;

    protected static $logFillable = true;

    public $table = 'job_postings';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'title',
        'description',
        'salary',
        'position_id',
        'position_type_id',
        'is_active',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'created_by',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'title' => 'string',
        'position_id' => 'integer',
        'position_type_id' => 'integer',
        'salary' => 'string',
        'is_active' => 'boolean',
        'description' => 'string',
        'status_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'created_by' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'position_type_id' => 'required',
        'description' => 'required',
        'status_id' => 'integer',
        'position_id' => 'required',
        'is_active' => 'boolean',
        'salary' => 'nullable',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'created_by' => 'string',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function positionType()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
