<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class OfficeBranchType
 *
 * @package App\Customers\Models
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\OfficeBranch[] $branches
 * @property-read int|null $branches_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\OfficeBranchType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\OfficeBranchType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\OfficeBranchType query()
 * @mixin \Eloquent
 */
class OfficeBranchType extends Model
{
    use UsesTenantConnection;

    //

    /*
     * Relationships
     */

    /**
     * Branches of this type
     * @return HasMany
     */
    public function branches(): HasMany
    {
        return $this->hasMany(OfficeBranch::class);
    }
}
