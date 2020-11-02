<?php

namespace App\Customers\Models;

use App\Traits\ModelCountry;
use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Relative
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $address
 * @property string $land_mark
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zip_code
 * @property string $email
 * @property string $phone
 * @property int $relationship
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read mixed $country_name
 * @property-read mixed $location
 * @property-read string $state_name
 * @property-read \App\Customers\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Relative newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Relative newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Relative query()
 * @mixin \Eloquent
 */
class Relative extends Model
{
    use UsesTenantConnection, ModelCountry;

    //

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
