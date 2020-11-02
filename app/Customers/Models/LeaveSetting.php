<?php

namespace App\Customers\Models;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Customers\Models\LeaveSetting
 *
 * @property-read \App\Customers\Models\LeaveType $leaveType
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveSetting query()
 * @mixin \Eloquent
 * @property-read mixed $tag
 */
class LeaveSetting extends Model
{
    use UsesTenantConnection;

    protected $dates = [
        'submission_deadline',
        'start',
        'end',
    ];

    protected $perPage = 100;

    /*
     * Mutations and accessors
     */
    public function getTagAttribute(){
        return $this->leaveType->name . ' - ' . $this->year;
    }

    /*
     * Relationships
     */

    /**
     * Leave type
     * @return BelongsTo
     */
    public function leaveType(): BelongsTo
    {
        return $this->belongsTo(LeaveType::class);
    }
}
