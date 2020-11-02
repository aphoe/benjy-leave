<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Certification
 *
 * @package App\Customers\Models
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\CertificationRecord[] $records
 * @property-read int|null $records_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\CertificationTarget[] $targets
 * @property-read int|null $targets_count
 * @method static \Illuminate\Database\Eloquent\Builder|Certification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certification query()
 * @mixin \Eloquent
 */
class Certification extends Model
{
    use UsesTenantConnection;

    /*
     * Relationships
     */

    /**
     * Certification records
     * @return HasMany
     */
    public function records(): HasMany
    {
        return $this->hasMany(CertificationRecord::class);
    }

    /**
     * Certification targets
     * @return HasMany
     */
    public function targets(): HasMany
    {
        return $this->hasMany(CertificationTarget::class);
    }
}
