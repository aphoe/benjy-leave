<?php


namespace App\Services;


use Carbon\Carbon;

class WorkDaysService
{

    /**
     * Total number of weekdays between two days
     * @param Carbon $start
     * @param Carbon $end
     * @return int
     */
    public function getTotalWeekdays(Carbon $start, Carbon $end): int
    {
        //If start and end dates are the same
        if($start->eq($end)){
            return $start->isWeekday() ? 1 : 0;
        }

        return $start->diffInDaysFiltered(function(Carbon $date) {
            return !$date->isWeekend();
        }, $end);
    }
}
