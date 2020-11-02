<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Customers\Models\LeaveType
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\Leave[] $leaves
 * @property-read int|null $leaves_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\LeaveSetting[] $settings
 * @property-read int|null $settings_count
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType query()
 * @mixin \Eloquent
 * @property-read string $leave_note_text
 * @property-read string $report_text
 * @property-read string $return_note_text
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType available($year = null)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType canApply(\Carbon\Carbon $date = null, $year = null)
 */
class LeaveType extends Model
{
    use UsesTenantConnection;

    protected $perPage = 100;

    /*
     * Accessors and mutators
     */
    public function getLeaveNoteTextAttribute(): string
    {
        return $this->has_leave_note ? 'Yes' : 'No';
    }

    public function getReturnNoteTextAttribute(): string
    {
        return $this->has_return_note ? 'Yes' : 'No';
    }

    public function getReportTextAttribute(): string
    {
        return $this->has_report ? 'Yes' : 'No';
    }

    /*
     * Scopes
     */

    /**
     * Check if a leave type is available for a chosen year
     * @param $query
     * @param int|null $year
     */
    public function scopeAvailable($query, int $year=null)
    {
        if($year === null){
            $year = date('Y');
        }

        $query->whereHas('settings', function ($query) use($year){
            $query->where('year', $year);
        });
    }

    /**
     * If user can still apply for this leave type
     * @param $query
     * @param Carbon|null $date
     * @param int|null $year
     */
    public function scopeCanApply($query, Carbon $date=null, int $year=null){
        if ($date === null) {
            $date = now();
        }
        if($year === null){
            $year = date('Y');
        }

        $query->available($year)
            ->whereHas('settings', function ($query) use ($date) {
                $query->where(function ($query) use ($date){
                    $query->whereNull('submission_deadline')
                        ->orWhere('submission_deadline', '>=', $date);
                });
        });
    }

    /*
     * Relationships
     */

    /**
     * Leave settings
     * @return HasMany
     */
    public function settings(): HasMany
    {
        return $this->hasMany(LeaveSetting::class);
    }

    /**
     * Leaves
     * @return HasMany
     */
    public function leaves(): HasMany
    {
        return $this->hasMany(Leave::class);
    }
}
