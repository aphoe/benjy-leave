<?php

namespace App\Interfaces;

use App\Customers\Models\LeaveSetting;
use Illuminate\Http\Request;

interface LeaveSettingRepositoryInterface
{
    public function save(LeaveSetting $setting, Request $request): LeaveSetting;
}
