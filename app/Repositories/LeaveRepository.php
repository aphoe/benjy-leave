<?php
namespace App\Repositories;

use App\Customers\Models\Leave;
use App\Enums\LeaveStatus;
use App\Interfaces\LeaveRepositoryInterface;
use Illuminate\Http\Request;

class LeaveRepository implements LeaveRepositoryInterface
{
    /**
     * Persist leave
     * @param Leave $leave
     * @param Request $request
     * @param int|null $user_id
     * @param bool $reset_status
     * @return Leave
     */
    public function store(Leave $leave, Request $request, int $user_id = null, bool $reset_status=false): Leave
    {
        if($user_id !== null){
            $leave->user_id = $user_id;
        }
        if($reset_status){
            $leave->status = LeaveStatus::Pending;
            $leave->reliever_status = LeaveStatus::Pending;
            $leave->supervisor_status = LeaveStatus::Pending;
        }

        $leave->leave_type_id = $request->leave_type_id;
        $leave->reliever_id = $request->reliever_id;
        $leave->supervisor_id = $request->supervisor_id;
        $leave->start = $request->start;
        $leave->end = $request->end;
        $leave->note = $request->note;
        $leave->save();

        return $leave;
    }

    /**
     * Update a status field
     * @param Leave $leave
     * @param string $field
     * @param int $value
     * @return bool
     */
    public function status(Leave $leave, string $field, int $value)
    {
        if(!in_array($value, LeaveStatus::getValues())){
            return $leave;
        }

        /*return Leave::where('id', $leave->id)
            ->update([
                $field => $value,
            ]);*/
        $leave[$field] = $value;
        $leave->save();

        return $leave;
    }
}
