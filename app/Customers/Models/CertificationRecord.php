<?php

namespace App\Customers\Models;

use App\Traits\ModelStatus;
use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CertificationRecord
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property int $certification_id
 * @property Carbon $date
 * @property string $certificate
 * @property int $status
 * @property string $note
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\Customers\Models\Certification $certification
 * @property-read string $status_text
 * @property-read \App\Customers\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationRecord query()
 * @mixin \Eloquent
 */
class CertificationRecord extends Model
{
    use UsesTenantConnection, ModelStatus;

    protected $dates = [
        'date',
    ];

    /*
     * Relationship
     */

    /**
     * Certification of this record
     * @return BelongsTo
     */
    public function certification(): BelongsTo
    {
        return $this->belongsTo(Certification::class);
    }

    /**
     * User who owns this record
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
