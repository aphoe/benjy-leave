<?php


namespace App\Repositories;


use App\Customers\Models\LeaveType;
use App\Interfaces\LeaveTypeRepositoryInterface;
use Illuminate\Http\Request;

class LeaveTypeRepository implements LeaveTypeRepositoryInterface
{
    public function store(LeaveType $leaveType, Request $request): LeaveType
    {
        $leaveType->name = $request->name;
        $leaveType->description = $request->description;
        $leaveType->has_leave_note = $request->has_leave_note;
        $leaveType->has_return_note = $request->has_return_note;
        $leaveType->has_report = $request->has_report;
        $leaveType->save();

        return $leaveType;
    }
}
