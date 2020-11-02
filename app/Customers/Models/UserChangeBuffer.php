<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserChangeBuffer
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property string $surname
 * @property string $first_name
 * @property string $other_name
 * @property string $email
 * @property int $accepted
 * @property int $accepted_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read string $official_name
 * @property-read \App\Customers\Models\User $staffHandler
 * @property-read \App\Customers\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\UserChangeBuffer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\UserChangeBuffer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\UserChangeBuffer query()
 * @mixin \Eloquent
 */
class UserChangeBuffer extends Model
{
    use UsesTenantConnection;

    /*
     * Accessors and mutators
     */
    /**
     * Compose user's name in official format
     * @return string
     */
    public function getOfficialNameAttribute(): string
    {
        return strtoupper($this->surname) . ", {$this->first_name} {$this->other_name}";
    }

    /**
     * Format surname before saving
     * @param $value
     */
    public function setSurnameAttribute($value): void
    {
        $this->attributes['surname'] = ucwords($value);
    }

    /**
     * Format first name before saving
     * @param $value
     */
    public function setFirstNameAttribute($value): void
    {
        $this->attributes['first_name'] = ucwords($value);
    }

    /**
     * Format other name before saving
     * @param $value
     */
    public function setOtherNameAttribute($value): void
    {
        $this->attributes['other_name'] = ucwords($value);
    }

    /*
     * Relationships
     */

    /**
     * User making request
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * User who accepted/declined the request
     * @return BelongsTo
     */
    public function staffHandler(): BelongsTo
    {
        return $this->belongsTo(User::class, 'handler');
    }
}
