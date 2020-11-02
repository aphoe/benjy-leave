<?php

namespace App\Customers\Models;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Customers\Models\LeaveReport
 *
 * @property-read \App\Customers\Models\Leave $leave
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveReport query()
 * @mixin \Eloquent
 */
class LeaveReport extends Model
{
    use UsesTenantConnection;

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
}
