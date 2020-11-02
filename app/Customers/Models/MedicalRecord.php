<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class MedicalRecord
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property string $notes
 * @property string $file
 * @property Carbon $effective_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\Customers\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\MedicalRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\MedicalRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\MedicalRecord query()
 * @mixin \Eloquent
 */
class MedicalRecord extends Model
{
    use UsesTenantConnection;

    protected $dates = [
        'effective_date',
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
