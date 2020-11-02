<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserBlock
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property int $blocker_id
 * @property int $unblocker_id
 * @property string $reason
 * @property Carbon $unblocked_at
 * @property string $note
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property-read \App\Customers\Models\User $blocker
 * @property-read \App\Customers\Models\User $unblocker
 * @property-read \App\Customers\Models\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\UserBlock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\UserBlock newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Customers\Models\UserBlock onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\UserBlock query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Customers\Models\UserBlock withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Customers\Models\UserBlock withoutTrashed()
 * @mixin \Eloquent
 */
class UserBlock extends Model
{
    use UsesTenantConnection, SoftDeletes;

    //

    /**
     * Relationships
     */

    /**
     * User that was blocked
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * User who blocked
     * @return BelongsTo
     */
    public function blocker(){
        return $this->belongsTo(User::class, 'blocker_id');
    }

    /**
     * user who unblocked
     * @return BelongsTo
     */
    public function unblocker(){
        return $this->belongsTo(User::class, 'unblocker_id');
    }
}
