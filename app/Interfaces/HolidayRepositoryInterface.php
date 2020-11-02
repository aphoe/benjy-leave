<?php

namespace App\Interfaces;

use App\Customers\Models\Holiday;
use Illuminate\Http\Request;

interface HolidayRepositoryInterface
{
    public function store(Holiday $holiday, Request $request);
}
