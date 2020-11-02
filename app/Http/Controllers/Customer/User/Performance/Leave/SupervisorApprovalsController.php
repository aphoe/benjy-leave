<?php

namespace App\Http\Controllers\Customer\User\Performance\Leave;

use App\Customers\Models\Leave;
use App\Customers\Models\LeaveApproval;
use App\Enums\LeaveStatus;
use App\Enums\LogType;
use App\Http\Controllers\Controller;
use App\Interfaces\LeaveApprovalRepositoryInterface;
use App\Interfaces\LeaveRepositoryInterface;
use App\Notifications\StaffLeaveSupervisorApproval;
use App\Services\WorkDaysService;
use Illuminate\Http\Request;
use Validator;

class SupervisorApprovalsController extends Controller
{
    private $user;
    private $logDetail;
    /**
     * @var WorkDaysService
     */
    private $workDaysService;
    /**
     * @var LeaveRepositoryInterface
     */
    private $leaveRepository;
    /**
     * @var LeaveApprovalRepositoryInterface
     */
    private $leaveApprovalRepository;

    /**
     * SupervisorApprovalsController constructor.
     * @param WorkDaysService $workDaysService
     * @param LeaveRepositoryInterface $leaveRepository
     * @param LeaveApprovalRepositoryInterface $leaveApprovalRepository
     */
    public function __construct(WorkDaysService $workDaysService, LeaveRepositoryInterface $leaveRepository, LeaveApprovalRepositoryInterface $leaveApprovalRepository)
    {
        $this->middleware(['auth']);

        $this->middleware(function ($request, $next) {
            $this->user = \Auth::user();
            return $next($request);
        });

        $this->logDetail = 'supervisor-leave-approval';
        $this->workDaysService = $workDaysService;
        $this->leaveRepository = $leaveRepository;
        $this->leaveApprovalRepository = $leaveApprovalRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = $this->user->leaveSupervisions()
            ->with(['leaveType', 'user'])
            ->where('supervisor_status', LeaveStatus::Pending)
            ->relieverApproved()
            ->orderBy('start', 'desc')
            ->paginate();

        $data = [
            'title' => 'Leave Approvals',
            'meta_desc' => 'leave approvals',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'customer',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'user/leave' => 'Leave',
                'active' => 'Supervisor approvals',
            ],
            'leaves' => $leaves,
            'work_day_service' => $this->workDaysService,
        ];
        return view('customer.user.performance.leave.supervisor.approval.index', $data);
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
        //Validation
        $rules = [
            'status' => 'required|in:' . LeaveStatus::Approved . ',' . LeaveStatus::Denied,
            'reason' => 'required|min:10',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return $validator->messages()->first();
        }

        $leave = Leave::with(['user', 'leaveType'])
            ->where('supervisor_id', $this->user->id)
            ->where('supervisor_status', LeaveStatus::Pending)
            ->relieverApproved()
            ->findOrFail(hashDecode($id));

        $leave = $this->leaveRepository->status($leave, 'supervisor_status', $request->status);
        $approval = LeaveApproval::where('leave_id', $leave->id)
            ->where('supervisor_id', $this->user->id)
            ->first();
        if($approval === null){
            $approval = new LeaveApproval();
        }
        $approval = $this->leaveApprovalRepository->store($approval, $leave, $this->user, $request);

        $bg_class = $leave->supervisor_approval === LeaveStatus::Approved ? 'success' : 'danger';

        logUser(LogType::Process, $this->logDetail, $leave->tag . '|' . $leave->user->name . '|' . $request->action);
        makeUserNotification($leave->user->id, $this->user->id, $leave->tag, 'Leave application: ' . LeaveStatus::getDescription($leave->supervisor_status) );
        $leave->user->notify(new StaffLeaveSupervisorApproval($leave, $this->user));

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
