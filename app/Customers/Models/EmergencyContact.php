<?php

namespace App\Customers\Models;

use App\Traits\ModelCountry;
use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class EmergencyContact
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property string $photo
 * @property string $relationship
 * @property bool $next_of_kin
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $land_mark
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zip_code
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read mixed $country_name
 * @property-read mixed $location
 * @property-read string $state_name
 * @property-read \App\Customers\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\EmergencyContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\EmergencyContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\EmergencyContact query()
 * @mixin \Eloquent
 * @property-read string $next_of_kin_string
 */
class EmergencyContact extends Model
{
    use UsesTenantConnection, ModelCountry;

    //

    /*
     * Accessors and mutators
     */
    /**
     * Relationship field mutator
     * @param $value
     */
    public function setRelationshipAttribute($value): void
    {
        $this->attributes['relationship'] = strtolower($value);
    }

    /**
     * Relationship field accessor
     * @param $value
     * @return string
     */
    public function getRelationshipAttribute($value): string
    {
        return ucwords($value);
    }

    /**
     * Next of kin as string
     * @param $value
     * @return string
     */
    public function getNextOfKinStringAttribute($value): string
    {
        return $this->attributes['next_of_kin'] ? 'Yes' : 'No';
    }

    /*
     * Relationship
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
