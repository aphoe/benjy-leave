<?php

namespace App\Customers\Models;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Customers\Models\LeaveNote
 *
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveNote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveNote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveNote query()
 * @mixin \Eloquent
 */
class LeaveNote extends Model
{
    use UsesTenantConnection;

    /*
     * Relationships
     */

    /**
     * Leave
     * @return BelongsTo
     */
    public function leave(): BelongsTo
    {
        return $this->belongsTo(Leave::class);
    }
}
