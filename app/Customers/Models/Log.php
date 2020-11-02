<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Log
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property string $ip
 * @property int $crud
 * @property string $action
 * @property string $details
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\Customers\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Log query()
 * @mixin \Eloquent
 */
class Log extends Model
{
    use UsesTenantConnection;

    /*
     * Accessors and mutators
     */

    /**
     * Action must always be in lower case
     * @param $value
     */
    public function setActionAttribute($value){
        $this->attributes['action'] = strtolower($value);
    }

    /*
     * Relationship
     */


    /**
     * User who is being logs
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
