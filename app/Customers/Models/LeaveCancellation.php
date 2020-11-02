<?php

namespace App\Customers\Models;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Customers\Models\LeaveCancellation
 *
 * @property-read \App\Customers\Models\Leave $leave
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveCancellation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveCancellation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveCancellation query()
 * @mixin \Eloquent
 */
class LeaveCancellation extends Model
{
    use UsesTenantConnection;

    /*
     * Relationships
     */

    /**
     * Leave being cancelled
     * @return BelongsTo
     */
    public function leave(): BelongsTo
    {
        return $this->belongsTo(Leave::class);
    }
}
