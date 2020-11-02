<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Permission
 *
 * @package App\Customers\Models
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\Customers\Models\PermissionDefinition $definition
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission role($roles, $guard = null)
 * @mixin \Eloquent
 */
class Permission extends \Spatie\Permission\Models\Permission
{
    use UsesTenantConnection;

    /**
     * Relationships
     */

    /**
     * Definition of this permission
     * @return HasOne
     */
    public function definition(): HasOne
    {
        return $this->hasOne(PermissionDefinition::class);
    }
}
