<?php

namespace App\Customers\Models;

use App\Enums\LeaveStatus;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Customers\Models\Leave
 *
 * @property-read \App\Customers\Models\LeaveApproval|null $approval
 * @property-read \App\Customers\Models\LeaveCancellation|null $cancellation
 * @property-read \App\Customers\Models\User $hr
 * @property-read \App\Customers\Models\LeaveType $leaveType
 * @property-read \App\Customers\Models\User $reliever
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\LeaveReport[] $reports
 * @property-read int|null $reports_count
 * @property-read \App\Customers\Models\User $supervisor
 * @property-read \App\Customers\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Leave newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Leave newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Leave query()
 * @mixin \Eloquent
 * @property-read mixed $taken_text
 */
class Leave extends Model
{
    use UsesTenantConnection;

    protected $dates = [
        'start',
        'end',
        'extension'
    ];

    /*
     * Accessors and mutators
     */

    /**
     * Text representation of the taken field
     * @return string
     */
    public function getTakenTextAttribute()
    {
        return $this->taken ? 'Yes' : 'No';
    }

    /**
     * Tag name or label of a holiday
     * @return string
     */
    public function getTagAttribute(): string
    {
        return $this->leaveType->name . ' - ' . $this->start->format('M Y');
    }

    /**
     * Display note in visible line breaks
     * @return string|string[]
     */
    public function getNoteDisplayAttribute()
    {
        return str_replace("\r\n", '<br>', $this->attributes['note']);
    }

    /*
     * Scope
     */

    /**
     * Leave accepted by reliever
     * @param $query
     * @return mixed
     */
    public function scopeRelieverApproved($query)
    {
        return $query->where(function($query){
            $query->whereNull('reliever_id')
                ->orWhere('reliever_status', LeaveStatus::Approved);
        });
    }

    /**
     * Leave application accepted by reliever
     * @param $query
     * @return mixed
     */
    public function scopeSupervisorApproved($query)
    {
        return $query->where(function($query){
            $query->whereNull('supervisor_id')
                ->orWhere('supervisor_status', LeaveStatus::Approved);
        });
    }

    /*
     * Methods
     */

    /**
     * Text representation of status fields
     * @param $status_field
     * @return string
     */
    public function statusText($status_field)
    {
        return LeaveStatus::getDescription((int) $this->attributes[$status_field]);
    }

    /**
     * Check if leave has ended
     * @return bool
     */
    public function hasEnded(): bool
    {
        $end = $this->end;
        if($this->extension !== null && $this->extension->gt($end)){
            $end = $this->extension;
        }

        return now()->gte($end);
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
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }

    /**
     * User requesting for leave
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * User's supervisor
     * @return BelongsTo
     */
    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    /**
     * HR personnel handling the leave
     * @return BelongsTo
     */
    public function hr(): BelongsTo
    {
        return $this->belongsTo(User::class, 'hr_id');
    }

    /**
     * Staff member relieving the user
     * @return BelongsTo
     */
    public function reliever(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reliever_id');
    }

    /**
     * Cancellation of [approved] leave by user
     * @return HasOne
     */
    public function cancellation(): HasOne
    {
        return $this->hasOne(LeaveCancellation::class);
    }

    /*
     * Leave approval bu supervisor
     */
    public function approval(): HasOne
    {
        return $this->hasOne(LeaveApproval::class);
    }

    /**
     * Leave reports
     * @return HasMany
     */
    public function reports(): HasMany
    {
        return $this->hasMany(LeaveReport::class);
    }

    /**
     * Handover and return notes
     * @return HasMany
     */
    public function leaveNote(): HasMany
    {
        return $this->hasMany(LeaveNote::class);
    }
}
