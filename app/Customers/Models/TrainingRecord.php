<?php

namespace App\Customers\Models;

use App\Traits\ModelStatus;
use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TrainingRecord
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property int $training_id
 * @property Carbon $date
 * @property string $certificate
 * @property int $status
 * @property string $note
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read string $status_text
 * @property-read \App\Customers\Models\Training $training
 * @property-read \App\Customers\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingRecord query()
 * @mixin \Eloquent
 */
class TrainingRecord extends Model
{
    use  UsesTenantConnection, ModelStatus;

    protected $dates = [
        'date',
    ];

    /*
     * Relationships
     */

    /**
     * User who's target this is
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Training
     * @return BelongsTo
     */
    public function training():BelongsTo
    {
        return $this->belongsTo(Training::class);
    }
}
