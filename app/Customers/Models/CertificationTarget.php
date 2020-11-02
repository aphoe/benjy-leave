<?php

namespace App\Customers\Models;

use App\Traits\ModelActive;
use App\Traits\ModelStatus;
use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CertificationTarget
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property int $certification_id
 * @property Carbon $soft_deadline
 * @property Carbon $hard_deadline
 * @property string $note
 * @property boolean $completed
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\Customers\Models\Certification $certification
 * @property-read string $status_text
 * @property-read \App\Customers\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationTarget newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationTarget newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationTarget query()
 * @mixin \Eloquent
 */
class CertificationTarget extends Model
{
    use UsesTenantConnection, ModelStatus;

    protected $dates = [
        'soft_deadline',
        'hard_deadline',
    ];

    /*
     * Relationships
     */

    /**
     * Certification of this target
     * @return BelongsTo
     */
    public function certification(): BelongsTo
    {
        return $this->belongsTo(Certification::class);
    }

    /**
     * User who owns this target
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
