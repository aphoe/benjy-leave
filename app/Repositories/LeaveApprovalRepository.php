<?php
namespace App\Repositories;

use App\Customers\Models\Leave;
use App\Customers\Models\LeaveApproval;
use App\Customers\Models\User;
use App\Interfaces\LeaveApprovalRepositoryInterface;
use Illuminate\Http\Request;

class LeaveApprovalRepository implements LeaveApprovalRepositoryInterface
{
    /**
     * Create or update Leave approval
     * @param LeaveApproval $approval
     * @param Leave $leave
     * @param User $supervisor
     * @param Request $request
     * @return LeaveApproval
     */
    public function store(LeaveApproval $approval, Leave $leave, User $supervisor, Request $request): LeaveApproval
    {
        $approval->leave_id = $leave->id;
        $approval->supervisor_id = $supervisor->id;
        $approval->status = $request->status;
        $approval->reason = $request->reason;
        $approval->save();

        return $approval;
    }
}
