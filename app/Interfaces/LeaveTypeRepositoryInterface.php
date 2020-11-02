<?php

namespace App\Interfaces;

use App\Customers\Models\LeaveType;
use Illuminate\Http\Request;

interface LeaveTypeRepositoryInterface
{
    public function store(LeaveType $leaveType, Request $request): LeaveType;
}
