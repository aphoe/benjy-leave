<?php

namespace App\Http\Controllers\Customer\Performance\Leave;

use App\Customers\Models\Leave;
use App\Enums\LeaveStatus;
use App\Enums\LogType;
use App\Http\Controllers\Controller;
use App\Interfaces\LeaveRepositoryInterface;
use App\Notifications\LeaveApproval;
use App\Notifications\LeaveApprovedSupervisor;
use App\Notifications\StaffLeaveRelieveApproval;
use App\Notifications\StaffLeaveRelieverSupervisor;
use App\Services\WorkDaysService;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    private $user;
    private $logDetail;
    /**
     * @var LeaveRepositoryInterface
     */
    private $leaveRepository;
    /**
     * @var WorkDaysService
     */
    private $workDaysService;

    /**
     * ApplicationsController constructor.
     * @param LeaveRepositoryInterface $leaveRepository
     * @param WorkDaysService $workDaysService
     */
    public function __construct(LeaveRepositoryInterface $leaveRepository, WorkDaysService $workDaysService)
    {
        $this->middleware(['auth']);

        $this->middleware(function ($request, $next) {
            $this->user = \Auth::user();
            return $next($request);
        });

        $this->middleware('permission:leave-super-admin|leave-admin')->except('index');

        $this->logDetail = 'leave-application';
        $this->leaveRepository = $leaveRepository;
        $this->workDaysService = $workDaysService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::with('user', 'reliever', 'supervisor', 'leaveType', 'approval')
            ->relieverApproved()
            ->supervisorApproved()
            ->where('status', LeaveStatus::Pending)
            ->orderBy('start', 'desc')
            ->paginate();

        $data = [
            'title' => 'Leave applications',
            'meta_desc' => 'Leave appications',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'hr',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'performance/leave' => 'Leave',
                'active' => 'Leave applications'
            ],
            'leaves' => $leaves,
            'work_day_service' => $this->workDaysService
        ];
        return view('customer.performance.leave.application.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // $request->all();
        $leave = Leave::with(['user', 'leaveType'])
            ->relieverApproved()
            ->supervisorApproved()
            ->where('status', LeaveStatus::Pending)
            ->findOrFail(hashDecode($id));

        $bg_class = null;
        $leave->hr_id = $this->user->id;
        switch($request->action){
            case 'accept':
                $leave->status = LeaveStatus::Approved;
                $bg_class = 'success';
                if($leave->supervisor_id !== null)
                {
                    makeUserNotification($leave->supervisor->id, $this->user->id, 'Leave for ' . $leave->user->name, ' approved', 'user/leave/supervisor/accepted' );
                    $leave->supervisor->notify(new LeaveApprovedSupervisor($leave));
                }
                break;
            case 'decline':
                $leave->reliever_status = LeaveStatus::Denied;
                $bg_class = 'danger';

                if($leave->supervisor_id !== null)
                {
                    makeUserNotification($leave->supervisor->id, $this->user->id, 'Leave for ' . $leave->user->name, ' declined');
                }
                break;
            default:
                return 0;
        }

        $leave->save();

        logUser(LogType::Process, $this->logDetail, $leave->tag . '|' . $leave->user->name . '|' . $request->action);
        makeUserNotification($leave->user->id, $this->user->id, $leave->tag, $leave->tag . ': ' . LeaveStatus::getDescription($leave->status) );
        $leave->user->notify(new LeaveApproval($leave));

        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
