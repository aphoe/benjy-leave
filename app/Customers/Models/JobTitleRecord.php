<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JobTitleRecord
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property int $job_title_id
 * @property int $business_unit_id
 * @property int $office_branch_id
 * @property int $reports_to
 * @property string $title
 * @property Carbon $start
 * @property Carbon $probation
 * @property Carbon $end
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property-read \App\Customers\Models\OfficeBranch $branch
 * @property-read \App\Customers\Models\JobTitle $jobTitle
 * @property-read \App\Customers\Models\User $reportsTo
 * @property-read \App\Customers\Models\BusinessUnit $unit
 * @property-read \App\Customers\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitleRecord current()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitleRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitleRecord newQuery()
 * @method static \Illuminate\Database\Query\Builder|JobTitleRecord onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitleRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitleRecord recentFirst()
 * @method static \Illuminate\Database\Query\Builder|JobTitleRecord withTrashed()
 * @method static \Illuminate\Database\Query\Builder|JobTitleRecord withoutTrashed()
 * @mixin \Eloquent
 */
class JobTitleRecord extends Model
{
    use UsesTenantConnection, SoftDeletes;

    protected $dates = [
        'start',
        'probation',
        'end',
    ];

    protected $perPage = 100;

    /*
     * Scopes
     */

    /**
     * User is currently active in this title
     * @param $query
     * @return mixed
     */
    public function scopeCurrent($query)
    {
        return $query->where('end', null)
            ->orWhere('end', '>', now());
    }

    public function scopeRecentFirst($query)
    {
        return $query->orderBy('start', 'desc');
    }

    /*
     * Relationships
     */

    /**
     * User who owns this model
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function branch(): BelongsTo {
        return $this->belongsTo(OfficeBranch::class, 'office_branch_id');
    }

    /**
     * Superior user (by title) who this user reports to
     * @return BelongsTo
     */
    public function reportsTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reports_to');
    }

    /**
     * Unit a job title belongs to
     * @return BelongsTo
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(BusinessUnit::class, 'business_unit_id');
    }

    /**
     * Job title
     * @return BelongsTo
     */
    public function jobTitle(): BelongsTo
    {
        return $this->belongsTo(JobTitle::class);
    }
}
