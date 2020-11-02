<?php

namespace App\Interfaces;

use App\Customers\Models\Leave;
use Illuminate\Http\Request;

interface LeaveRepositoryInterface
{
    /**
     * Persist leave
     * @param Leave $leave
     * @param Request $request
     * @param int|null $user_id
     * @param bool $reset_status
     * @return Leave
     */
    public function store(Leave $leave, Request $request, int $user_id = null, bool $reset_status = false): Leave;

    /**
     * Update a status field
     * @param Leave $leave
     * @param string $field
     * @param int $value
     * @return bool
     */
    public function status(Leave $leave, string $field, int $value);
}
