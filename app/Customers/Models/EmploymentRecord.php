<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EmploymentRecord
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $user_id
 * @property int $employment_type_id
 * @property string $employee_number
 * @property bool $employee_status
 * @property Carbon $hired
 * @property Carbon $exited
 * @property bool $updated
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property-read \App\Customers\Models\EmploymentType $employmentType
 * @property-read string $employee_status_text
 * @property-read \App\Customers\Models\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\EmploymentRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\EmploymentRecord newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Customers\Models\EmploymentRecord onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\EmploymentRecord query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Customers\Models\EmploymentRecord withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Customers\Models\EmploymentRecord withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentRecord employed()
 */
class EmploymentRecord extends Model
{
    use UsesTenantConnection, SoftDeletes;

    protected $dates = [
        'hired',
        'exited',
    ];

    protected $perPage = 100;

    /*
     * Accessors and mutators
     */
    /**
     * Show employment  status as a Yes/No string
     * @return string
     */
    public function getEmployeeStatusTextAttribute(){
        return $this->employee_status ? 'Yes' : 'No';
    }

    /*
     * Scope
     */

    /**
     * Select only staff still in employment
     * @param $query
     * @return mixed
     */
    public function scopeEmployed($query){
        return $query->where('exited', '>', now())
            ->orWhere('exited', null);
    }

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

    /**
     * Employment type for this job
     * @return BelongsTo
     */
    public function employmentType(): BelongsTo
    {
        return $this->belongsTo(EmploymentType::class);
    }
}
