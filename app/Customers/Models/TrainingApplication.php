<?php

namespace App\Customers\Models;

use App\Traits\ModelCountry;
use App\Traits\ModelStatus;
use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TrainingApplication
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property int $training_id
 * @property Carbon $start
 * @property Carbon $end
 * @property int $status
 * @property string $organiser
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zip_code
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read mixed $country_name
 * @property-read mixed $location
 * @property-read string $state_name
 * @property-read string $status_text
 * @property-read \App\Customers\Models\Training $training
 * @property-read \App\Customers\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingApplication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingApplication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingApplication query()
 * @mixin \Eloquent
 */
class TrainingApplication extends Model
{
    use UsesTenantConnection, ModelCountry, ModelStatus;

    protected $dates = [
        'start',
        'end',
    ];

    /*
     * Relationships
     */

    /**
     * User whose application this is
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Training applied for
     * @return BelongsTo
     */
    public function training():BelongsTo
    {
        return $this->belongsTo(Training::class);
    }
}
