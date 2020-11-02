<?php


namespace App\Services;



use App\Customers\Models\Leave;
use App\Customers\Models\LeaveType;
use App\Customers\Models\User;
use App\Notifications\StaffLeaveRelieve;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class LeaveService
{
    private $workDaysService;

    public function __construct()
    {
        $this->workDaysService = new WorkDaysService();
    }

    /**
     * Remaining leave days of a type the user has
     * @param User $user
     * @param LeaveType $leaveType
     * @param int|null $year
     * @return int
     */
    public function remainingLeaveDays(User $user, LeaveType $leaveType, int $year=null):int
    {
        if($year === null){
            $year = date('Y');
        }

        $setting = $leaveType->settings()
            ->where('year', $year)
            ->first();

        if($setting === null){
            return 0;
        }

        return $setting->days - $this->leaveTaken($user, $leaveType, $year);
    }

    /**
     * Total leave of particular type taken by user
     * @param User $user
     * @param LeaveType $leaveType
     * @param int|null $year
     * @return int
     */
    public function leaveTaken(User $user, LeaveType $leaveType, int $year=null): int
    {
        //Set this year as $year if not set
        if($year === null){
            $year = date('Y');
        }

        //Get all taken leaves of this user of type $leaveType
        $leaves = Leave::whereYear('start', $year)
            ->where('user_id', $user->id)
            ->where('leave_type_id', $leaveType->id)
            ->where('taken', true)
            ->get();

        //If no leave has been taken
        if($leaves->count() < 1){
            return 0;
        }

        $taken = 0; //Total taken days
        $holiday_service = new HolidayService();
        foreach ($leaves as $leave){
            $end = $leave->extension === null ? $leave->end : $leave->extension;
            $taken += $this->workDaysService->getTotalWeekdays($leave->start, $end) - $holiday_service->holidays($leave->start, $end);
        }

        return $taken;
    }

    /**
     * Notify a chosen reliever of intent
     * @param Leave $leave
     */
    public function notifyReliever(Leave $leave){
        makeUserNotification($leave->reliever_id, $leave->user_id, $leave->user->name, 'Please respond to request to relieve during leave', url('user/leave/relieve'));

        $leave->reliever->notify(new StaffLeaveRelieve($leave, $leave->user));
    }

    /**
     * Leave types a user can apply for
     * @return Collection
     */
    public function applicableLeaveTypes(): Collection
    {
        $leave_types = LeaveType::canApply()
            ->orderBy('name')
            ->pluck('name', 'id');

        if($leave_types->count() < 1){
            return redirect()->back()->with('theme-warning', 'There are no leave types you can apply for right now.');
        }

        return $leave_types;
    }

    /**
     * Options of relievers
     * @param array $exceptions
     * @return Collection
     */
    public function relieverOptions(array $exceptions=[]): Collection
    {
        return User::allowed()
            ->orderBy('surname')
            ->whereNotIn('id', $exceptions)
            ->get()
            ->pluck('official_name', 'id');
    }

    /**
     * Options of supervisors a user can choose
     * @param array $exceptions
     * @return Collection
     */
    public function supervisorOptions(array $exceptions=[]): Collection
    {
        return User::allowed()
            ->orderBy('surname')
            ->whereNotIn('id', $exceptions)
            ->get()
            ->pluck('official_name', 'id');
    }
}
