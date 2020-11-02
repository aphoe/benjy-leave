<?php

namespace App\Customers\Models;

use App\Traits\ModelCountry;
use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class EducationRecord
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zip_code
 * @property string $field_of_study
 * @property int $qualification
 * @property string $grade
 * @property int $started
 * @property int $finished
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read mixed $country_name
 * @property-read mixed $location
 * @property-read string $state_name
 * @property-read \App\Customers\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\EducationRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\EducationRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\EducationRecord query()
 * @mixin \Eloquent
 */
class EducationRecord extends Model
{
    use UsesTenantConnection, ModelCountry;

    protected $perPage = 100;

    /*
     * Relationships
     */

    /**
     * User who owns this model
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
