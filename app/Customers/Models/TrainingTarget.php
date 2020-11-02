<?php

namespace App\Customers\Models;

use App\Traits\ModelStatus;
use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TrainingTarget
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property int $training_id
 * @property Carbon $soft_deadline
 * @property Carbon $hard_deadline
 * @property string $note
 * @property boolean $completed
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read string $status_text
 * @property-read \App\Customers\Models\Training $training
 * @property-read \App\Customers\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingTarget newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingTarget newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingTarget query()
 * @mixin \Eloquent
 */
class TrainingTarget extends Model
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
