<?php

declare(strict_types=1);

namespace App\Models\Ref;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory,
        SoftDeletes;

    protected static $logFillable = true;

    public $table = 'ref_statuses';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'parent_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'parent_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function parent()
    {
        return $this->belongsTo(Status::class, 'parent_id');
    }

    #[Scope]
    protected function isParent(Builder $query): void
    {
        $query->whereNull('parent_id');
    }

    #[Scope]
    protected function isJobStatus(Builder $query): void
    {
        $query->where('parent_id', 7);
    }

    #[Scope]
    protected function isApplicationStatus(Builder $query): void
    {
        $query->where('parent_id', 1);
    }
}
