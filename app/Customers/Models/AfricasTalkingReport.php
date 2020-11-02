<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Customers\Models\AfricasTalkingReport
 *
 * @property int $id
 * @property int $user_id
 * @property int $sms_gateway_id
 * @property string $to
 * @property string $message_id
 * @property string $message_part
 * @property string $number
 * @property string $cost
 * @property string $status
 * @property string $status_code
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property-read \App\Customers\Models\User $sender
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\AfricasTalkingReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\AfricasTalkingReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\AfricasTalkingReport query()
 * @mixin \Eloquent
 * @property-read \App\Customers\Models\SmsGateway $gateway
 */
class AfricasTalkingReport extends Model
{
    use UsesTenantConnection;

    /*
     * Relationships
     */

    /**
     * USer who sent the message
     * @return BelongsTo
     */
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function gateway()
    {
        return $this->belongsTo(SmsGateway::class, 'sms_gateway_id');
    }
}
