<?php

namespace App\Customers\Models;

use App\Traits\ModelActive;
use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Customers\Models\SmsGateway
 *
 * @property int $id
 * @property string $gateway
 * @property string $username
 * @property string $password
 * @property string $key
 * @property string $sender
 * @property bool $active
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\SmsGateway newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\SmsGateway newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\SmsGateway query()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\AfricasTalkingReport[] $africasTalkingReports
 * @property-read int|null $africas_talking_reports_count
 * @property-read string $active_status
 */
class SmsGateway extends Model
{
    use UsesTenantConnection;
    use ModelActive;

    /**
     * AfricasTalking API reports
     * @return HasMany
     */
    public function africasTalkingReports(): HasMany
    {
        return $this->hasMany(AfricasTalkingReport::class);
    }
}
