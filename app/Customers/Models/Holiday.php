<?php

namespace App\Customers\Models;

use App\Traits\DateFormat;
use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use DateFormat, UsesTenantConnection;

    protected $perPage = 100;
    protected $dates = [
        'start',
        'end',
    ];

    /*
     * Accessors and mutators
     */

    /**
     * Tag name or label of a holiday
     * @return string
     */
    public function getTagAttribute(): string
    {
        return $this->attributes['name'] . ' ' . $this->attributes['year'];
    }

    /**
     * End date of a holiday
     * @return Carbon
     */
    public function getEndDateAttribute(): Carbon
    {
        return $this->end ?? $this->start;
    }

    /*
     * Scopes
     */
    /**
     * Arrange holidays in descending order
     * @param $query
     * @return mixed
     */
    public function scopeOrderDesc($query){
        return $query->orderBy('year', 'desc')
            ->orderBy('start', 'desc');
    }
}
