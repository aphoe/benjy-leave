<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property string $url
 * @property string $bg_class
 * @property int $type
 * @property string $info_class
 * @property int $sender_id
 * @property string $detail
 * @property string $message
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\User $sender
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Notification query()
 * @mixin \Eloquent
 */
class Notification extends \App\Notification
{
    use UsesTenantConnection;

    //
}
