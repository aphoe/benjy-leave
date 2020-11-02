<?php


namespace App\Services;


use App\Customers\Models\Holiday;
use Carbon\Carbon;

class HolidayService
{
    /**
     * @var WorkDaysService
     */
    private $workDaysService;

    public function __construct()
    {
        $this->workDaysService = new WorkDaysService();
    }

    /**
     * Holidays within a time frame
     * @param Carbon $start
     * @param Carbon $end
     * @return int
     */
    public function holidays(Carbon $start, Carbon $end): int
    {
        $holidays = Holiday::where(function ($query) use ($start, $end){
                $query->where('start', '>=', $start)
                    ->where('start', '<=', $end);
            })
            ->orWhere(function ($query) use ($start, $end){
                $query->where('end', '>=', $start)
                    ->where('end', '<=', $end);
            })->get();

        //If no holiday is found
        if($holidays->count() < 1){
            return 0;
        }

        //Count holidays
        $days = 0;
        foreach ($holidays as $holiday){
            $h_start = $holiday->start->gte($start) ? $holiday->start : $start;
            $h_end = $holiday->end_date->lte($end) ? $holiday->end_date : $end;

            $days += $this->workDaysService->getTotalWeekdays($h_start, $h_end);
        }

        return $days;
    }

    /**
     * Number of days in a holiday
     * @param Holiday $holiday
     * @return int
     */
    public function daysInHoliday(Holiday $holiday): int
    {
        return $this->workDaysService->getTotalWeekdays($holiday->start, $holiday->end_date);
    }
}
