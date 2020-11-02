<?php

namespace App\Customers\Models;

use App\Traits\ModelActive;
use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class EmploymentType
 *
 * @package App\Customers\Models
 * @property int $id
 * @property string $name
 * @property string $description
 * @property bool $active
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read string $active_status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\EmploymentRecord[] $jobs
 * @property-read int|null $jobs_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\EmploymentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\EmploymentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\EmploymentType query()
 * @mixin \Eloquent
 */
class EmploymentType extends Model
{
    use UsesTenantConnection, ModelActive;

    /*
     * Relationships
     */

    /**
     * Employment records for this employment type
     * @return HasMany
     */
    public function jobs(): HasMany
    {
        return $this->hasMany(EmploymentRecord::class);
    }
}
