<?php

namespace App\Http\Controllers\Customer\Performance\Leave;

use App\Customers\Models\LeaveType;
use App\Http\Controllers\Controller;
use App\Http\Resources\LeaveSettingItem;
use Illuminate\Http\Request;

class LeaveTypeSettingsController extends Controller
{
    private $user;
    private $logDetail;

    public function __construct()
    {
        $this->middleware(['auth']);

        $this->middleware(function ($request, $next) {
            $this->user = \Auth::user();
            return $next($request);
        });

        $this->logDetail = 'leave-type-setting';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leave_type = LeaveType::findOrFail(hashDecode($id));

        return new LeaveSettingItem($leave_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->middleware('permission:leave-super-admin|leave-admin');

        $leave_type = LeaveType::findOrFail(hashDecode($id));
        $leave_type->has_leave_note = $request->leave_note == 'yes' ? true : false;
        $leave_type->has_return_note = $request->report == 'yes' ? true : false;
        $leave_type->has_report = $request->return_note == 'yes' ? true : false;
        $leave_type->save();

        return response()->json([
            'status' => 1,
            'data' => new LeaveSettingItem($leave_type)
        ]);
    }
}
