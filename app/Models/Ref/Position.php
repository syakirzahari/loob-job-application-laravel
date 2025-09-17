<?php

declare(strict_types=1);

namespace App\Models\Ref;

use App;
use Eloquent as Model;
use App\Models\Notification\Notification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
class Position extends Model
{
    use SoftDeletes;

    protected static $logFillable = true;

    public $table = 'ref_job_positions';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                 => 'integer',
        'name'               => 'string',
        'is_active'          => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

      #[Scope]
    protected function isActive(Builder $query) :void
    {
        $query->where('is_active', 1);
    }
}
