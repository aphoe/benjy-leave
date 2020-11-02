<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserDocument
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property int $document_type
 * @property string $file
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\Customers\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\UserDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\UserDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\UserDocument query()
 * @mixin \Eloquent
 */
class UserDocument extends Model
{
    use UsesTenantConnection;

    //

    /*
     * Relationships
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
