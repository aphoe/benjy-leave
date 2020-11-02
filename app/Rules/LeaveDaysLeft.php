<?php

namespace App\Rules;

use App\Customers\Models\LeaveType;
use App\Customers\Models\User;
use App\Services\LeaveService;
use App\Services\WorkDaysService;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class LeaveDaysLeft implements Rule
{
    private $start;
    private $msg;
    private $leaveType;
    private $workWeekService;
    private $leaveService;
    private $user;

    /**
     * Create a new rule instance.
     *
     * @param $start
     * @param int $leave_type_id
     * @param int|null $user_id
     */
    public function __construct($start, int $leave_type_id, int $user_id=null)
    {
        try {
            $this->start = Carbon::createFromFormat('Y-m-d', request()->get($start));
        }catch (\Exception $exception){
            $this->start = null;
        }

        //TODO: flexible to accommodate different years
        $this->leaveType = LeaveType::with(['settings' => function($query){
                $query->where('year', date('Y'));
            }])
            ->findOrFail($leave_type_id);
        $this->workWeekService = new WorkDaysService();
        $this->leaveService = new LeaveService();
        $this->user_id = $user_id;
        if($user_id === null){
            $this->user = \Auth::user();
        }else{
            $this->user = User::findOrFail($user_id);
        }
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $end = Carbon::createFromFormat('Y-m-d', $value);
        if($this->start === null){
            $this->msg = 'Start date missing';
            return false;
        }

        $requested_days = $this->workWeekService->getTotalWeekdays($this->start, $end);
        $remaining_days = $this->leaveService->remainingLeaveDays(\Auth::user(), $this->leaveType); //TODO: Accommodate other years
        if($requested_days > $remaining_days){
            $this->msg = 'Request days i.e. ' . $requested_days . ' is greater than the number of leave days (' . $remaining_days . ') of chosen type left ';
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->msg;
    }
}
