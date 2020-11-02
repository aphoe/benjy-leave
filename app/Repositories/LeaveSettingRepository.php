<?php


namespace App\Repositories;


use App\Customers\Models\LeaveSetting;
use App\Interfaces\LeaveSettingRepositoryInterface;
use Illuminate\Http\Request;

class LeaveSettingRepository implements LeaveSettingRepositoryInterface
{
    public function save(LeaveSetting $setting, Request $request): LeaveSetting
    {
        $setting->leave_type_id = $request->leave_type_id;
        $setting->year = $request->year;
        $setting->days = $request->days;
        $setting->shortest_notice = $request->shortest_notice;
        $setting->submission_deadline = $request->submission_deadline;
        $setting->start = $request->start;
        $setting->end = $request->end;
        $setting->save();

        return $setting;
    }
}
