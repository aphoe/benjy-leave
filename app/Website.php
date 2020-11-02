<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Website
 *
 * @property int $id
 * @property string $uuid
 * @property bool $renewal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $managed_by_database_connection References the database connection key in your database.php
 * @property-read \Illuminate\Database\Eloquent\Collection|\Hyn\Tenancy\Models\Hostname[] $hostnames
 * @property-read int|null $hostnames_count
 * @property-read \App\RegistrationField $registrationField
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Subscription[] $subscriptions
 * @property-read int|null $subscriptions_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website whereManagedByDatabaseConnection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website whereRenewal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website whereUuid($value)
 * @mixin \Eloquent
 */
class Website extends \Hyn\Tenancy\Models\Website
{
    /*
     * Relationships
     */

    /**
     * Subscriptions of this website
     * @return HasMany
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * Registration field of ths website
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function registrationField(){
        return $this->hasOne(RegistrationField::class);
    }
}
