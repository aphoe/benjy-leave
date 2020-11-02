<?php

namespace App\Customers\Models;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Customers\Models\LeaveResumption
 *
 * @property-read \App\Customers\Models\Leave $leave
 * @property-read \App\Customers\Models\User $supervisor
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveResumption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveResumption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveResumption query()
 * @mixin \Eloquent
 */
class LeaveResumption extends Model
{
    use UsesTenantConnection;

    protected $dates = [
        'resumed',
    ];

    /*
     * Relationship
     */

    /**
     * @return BelongsTo
     */
    public function leave(): BelongsTo
    {
        return $this->belongsTo(Leave::class);
    }

    /**
     * User's supervisor
     * @return BelongsTo
     */
    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }
}
