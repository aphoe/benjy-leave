<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Role
 *
 * @package App\Customers\Models
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\Customers\Models\RoleDefinition $definition
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Role query()
 * @mixin \Eloquent
 */
class Role extends \Spatie\Permission\Models\Role
{
    use UsesTenantConnection;

    /**
     * Relationships
     */

    /**
     * Role's definition
     * @return HasOne
     */
    public function definition(): HasOne
    {
        return $this->hasOne(RoleDefinition::class);
    }
}
