<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Hostname
 *
 * @property int $id
 * @property string $fqdn
 * @property string|null $redirect_to
 * @property bool $force_https
 * @property \Illuminate\Support\Carbon|null $under_maintenance_since
 * @property int|null $website_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Hyn\Tenancy\Models\Website|null $website
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereForceHttps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereFqdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereRedirectTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereUnderMaintenanceSince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereWebsiteId($value)
 * @mixin \Eloquent
 */
class Hostname extends \Hyn\Tenancy\Models\Hostname
{
    //
}
