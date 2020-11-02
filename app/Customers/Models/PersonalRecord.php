<?php

namespace App\Customers\Models;

use App\Enums\Gender;
use App\Enums\MaritalStatus;
use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class PersonalRecord
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property int $gender
 * @property Carbon $date_of_birth
 * @property bool $dob_public
 * @property int $marital_status
 * @property string $identification
 * @property bool $identification_approved
 * @property bool $updated
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\Customers\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\PersonalRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\PersonalRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\PersonalRecord query()
 * @mixin \Eloquent
 * @property-read string $dob_public_status
 * @property-read string $gender_desc
 * @property-read string $marital_status_desc
 */
class PersonalRecord extends Model
{
    use UsesTenantConnection;

    protected $dates = [
        'date_of_birth',
    ];

    /*
     * Accessors and mutators
     */

    /**
     * DOB public status
     * @return string
     */
    public function getDobPublicStatusAttribute(){
        return $this->attributes['dob_public'] ? 'Yes' : 'No';
    }

    /**
     * Marital status description
     * @return string
     */
    public function getMaritalStatusDescAttribute(){
        if($this->attributes['marital_status'] === null){
            return '';
        }else{
            return MaritalStatus::getDescription((int) $this->attributes['marital_status']);
        }
    }

    /**
     * Gender description
     * @return string
     */
    public function getGenderDescAttribute(){
        if($this->attributes['gender'] === null){
            return '';
        }else{
            return Gender::getDescription((int) $this->attributes['gender']);
        }
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
