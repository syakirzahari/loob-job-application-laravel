<?php

declare(strict_types=1);

namespace App\Models\Application;

use App\Models\Job\JobPosting;
use App\Models\Ref\Status;
use App\Models\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Application extends Model implements HasMedia
{
    use HasUlids,
        InteractsWithMedia,
        LogsActivity,
        SoftDeletes;

    protected static $logFillable = true;

    public $table = 'applications';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'reference_no',
        'job_posting_id',
        'user_id',
        'applicant_name',
        'applicant_email',
        'applicant_phone',
        'applicant_address',
        'expected_salary',
        'description',
        'status_id',
        'interview_date',
        'evaluation_remark',
        'evaluated_by',
        'evaluated_at',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'reference_no' => 'string',
        'job_posting_id' => 'string',
        'user_id' => 'string',
        'applicant_name' => 'string',
        'applicant_email' => 'string',
        'applicant_phone' => 'string',
        'applicant_address' => 'string',
        'expected_salary' => 'string',
        'description' => 'string',
        'status_id' => 'integer',
        'evaluation_remark' => 'string',
        'evaluated_by' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'reference_no' => 'required',
        'job_posting_id' => 'required',
        'user_id' => 'nullable',
        'applicant_name' => 'required',
        'applicant_email' => 'nullable',
        'applicant_phone' => 'required',
        'applicant_address' => 'nullable',
        'expected_salary' => 'nullable',
        'description' => 'required',
        'status_id' => 'required',
        'evaluation_remark' => 'nullable',
        'evaluated_by' => 'nullable',
        'evaluated_at' => 'nullable',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function jobPosting()
    {
        return $this->belongsTo(JobPosting::class, 'job_posting_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function evaluator()
    {
        return $this->belongsTo(User::class, 'evaluated_by');
    }

    public function statusLog()
    {
        return $this->hasMany(Log::class, 'application_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    #[Scope]
    protected function searchApplication(Builder $query, $searchString)
    {
        if ($searchString) {
            return $query->where('applicant_name', 'LIKE', "%{$searchString}%")
                ->orWhere('applicant_email', 'LIKE', "%{$searchString}%");
        }
    }

    #[Scope]
    protected function searchCandidateApplication(Builder $query, $searchString)
    {
        if ($searchString) {
            return $query->where('applicant_name', $searchString)
                ->orWhere('applicant_email', $searchString)
                ->orWhere('applicant_phone', $searchString);
        }
    }
}
