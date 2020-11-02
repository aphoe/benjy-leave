<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JobTitle
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $code
 * @property int $name
 * @property int $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property-read \App\Customers\Models\OfficeBranch $branch
 * @property-read \App\Customers\Models\User $reportsTo
 * @property-read \App\Customers\Models\BusinessUnit $unit
 * @property-read \App\Customers\Models\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\JobTitle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\JobTitle newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Customers\Models\JobTitle onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\JobTitle query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Customers\Models\JobTitle withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Customers\Models\JobTitle withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\JobTitleRecord[] $jobTitleRecords
 * @property-read int|null $job_title_records_count
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle activeRecords()
 */
class JobTitle extends Model
{
    use UsesTenantConnection, SoftDeletes;

    protected $perPage = 100;

    /*
     * Scopes
     */

    public function scopeActiveRecords($query)
    {
        return $query->whereHas('jobTitleRecords', function ($query){
            $query->current()
                ->whereHas('user.employmentRecord', function ($query){
                    $query->employed();
                });
        });
    }

    /*
     * Relationships
     */

    /**
     * Job title records
     * @return HasMany
     */
    public function jobTitleRecords(): HasMany
    {
        return $this->hasMany(JobTitleRecord::class);
    }
}
