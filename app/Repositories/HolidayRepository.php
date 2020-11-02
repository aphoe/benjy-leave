<?php
namespace App\Repositories;

use App\Customers\Models\Holiday;
use App\Interfaces\HolidayRepositoryInterface;
use Illuminate\Http\Request;

class HolidayRepository implements HolidayRepositoryInterface
{
    public function store(Holiday $holiday, Request $request)
    {
        $holiday->name = $request->name;
        $holiday->year = $request->year;
        $holiday->start = $request->start;
        $holiday->end = $request->end;
        $holiday->save();

        return $holiday;
    }
}
