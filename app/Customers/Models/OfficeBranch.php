<?php

namespace App\Customers\Models;

use App\Traits\ModelCountry;
use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class OfficeBranch
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $office_branch_type_id
 * @property int $branch_head_id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string $address
 * @property string $land_mark
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zip_code
 * @property string $timezone
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\Customers\Models\User $branchHead
 * @property-read \App\Customers\Models\OfficeBranchType $branchType
 * @property-read mixed $country_name
 * @property-read mixed $location
 * @property-read string $state_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\OfficeBranch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\OfficeBranch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\OfficeBranch query()
 * @mixin \Eloquent
 */
class OfficeBranch extends Model
{
    use UsesTenantConnection, ModelCountry;

    /*
     * Scope
     */

    /**
     * Branch office allowed on app [based on company subscription plan]
     * @param $query
     * @return mixed
     */
    public function scopeAllowed($query){
        return $query->where('allowed', true);
    }

    /*
     * Relationships
     */

    /**
     * Typeof this branch
     * @return BelongsTo
     */
    public function branchType(): BelongsTo
    {
        return $this->belongsTo(OfficeBranchType::class, 'office_branch_type_id');
    }

    /**
     * User heading branch
     * @return BelongsTo
     */
    public function branchHead(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
