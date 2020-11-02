<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BusinessUnit
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property-read \App\Customers\Models\User $head
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\JobTitle[] $jobTitles
 * @property-read int|null $job_titles_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\BusinessUnit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\BusinessUnit newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Customers\Models\BusinessUnit onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\BusinessUnit query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Customers\Models\BusinessUnit withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Customers\Models\BusinessUnit withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\JobTitleRecord[] $jobTitleRecords
 * @property-read int|null $job_title_records_count
 */
class BusinessUnit extends Model
{
    use UsesTenantConnection, SoftDeletes;

    /*
     * Accessors and mutators
     */
    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords($value);
    }

    /*
     * Relationships
     */

    /**
     * Head of unit
     * @return BelongsTo
     */
    public function head(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Job title records in this unit
     * @return HasMany
     */
    public function jobTitleRecords(): HasMany
    {
        return $this->hasMany(JobTitleRecord::class);
    }
}
