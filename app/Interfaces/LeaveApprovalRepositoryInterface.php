<?php

namespace App\Interfaces;

use App\Customers\Models\Leave;
use App\Customers\Models\LeaveApproval;
use App\Customers\Models\User;
use Illuminate\Http\Request;

interface LeaveApprovalRepositoryInterface
{
    /**
     * Create or update Leave approval
     * @param LeaveApproval $approval
     * @param Leave $leave
     * @param User $supervisor
     * @param Request $request
     * @return LeaveApproval
     */
    public function store(LeaveApproval $approval, Leave $leave, User $supervisor, Request $request): LeaveApproval;
}
