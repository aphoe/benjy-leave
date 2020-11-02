<?php

namespace App\Http\Controllers\Data;

use App\Customers\Models\Leave;
use App\Http\Controllers\Controller;
use App\Http\Resources\Customer\LeaveItem;
use App\Http\Resources\LeaveSettingItem;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware(['auth']);

        $this->middleware(function ($request, $next) {
            $this->user = \Auth::user();
            return $next($request);
        });
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $leave = Leave::findOrFail(hashDecode($id));
        return new LeaveItem($leave);
    }
}
