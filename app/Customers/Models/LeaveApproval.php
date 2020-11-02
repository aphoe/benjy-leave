<?php

namespace App\Customers\Models;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Customers\Models\LeaveApproval
 *
 * @property-read \App\Customers\Models\Leave $leave
 * @property-read \App\Customers\Models\User $supervisor
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveApproval newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveApproval newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveApproval query()
 * @mixin \Eloquent
 */
class LeaveApproval extends Model
{
    use UsesTenantConnection;

    /*
     * Accessors and mutators
     */

    /**
     * Display reason in visible line breaks
     * @return string|string[]
     */
    public function getReasonDisplayAttribute()
    {
        return str_replace("\r\n", '<br>', $this->attributes['reason']);
    }

    /*
     * Relationship
     */

    /**
     * Leave
     * @return BelongsTo
     */
    public function leave(): BelongsTo
    {
        return $this->belongsTo(Leave::class);
    }

    /**
     * Supervisor handling approval handled by supervisor
     * @return BelongsTo
     */
    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }
}
