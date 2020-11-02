<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Experience
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property int $employment_type
 * @property string $company
 * @property string $location
 * @property string $description
 * @property Carbon $start
 * @property Carbon $end
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\Customers\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Experience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Experience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Experience query()
 * @mixin \Eloquent
 */
class Experience extends Model
{
    use UsesTenantConnection;

    protected $dates = [
        'start',
        'end',
    ];

    /*
     * Relationship
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
