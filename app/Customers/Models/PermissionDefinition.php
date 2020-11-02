<?php

namespace App\Customers\Models;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Customers\Models\PermissionDefinition
 *
 * @property-read \App\Customers\Models\Permission $permission
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\PermissionDefinition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\PermissionDefinition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\PermissionDefinition query()
 * @mixin \Eloquent
 */
class PermissionDefinition extends Model
{
    use UsesTenantConnection;

    /**
     * Relationships
     */

    /**
     * Permission for this definition
     * @return BelongsTo
     */
    public function permission(): BelongsTo
    {
        return $this->belongsTo(Permission::class);
    }
}
