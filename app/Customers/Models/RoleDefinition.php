<?php

namespace App\Customers\Models;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Customers\Models\RoleDefinition
 *
 * @property-read \App\Customers\Models\Role $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\RoleDefinition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\RoleDefinition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\RoleDefinition query()
 * @mixin \Eloquent
 */
class RoleDefinition extends Model
{
    use UsesTenantConnection;

    /**
     * Relationships
     */

    /**
     * Role for this definition
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
