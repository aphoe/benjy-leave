<?php

namespace App\Http\Controllers\Customer\User\Performance\Leave;

use App\Customers\Models\Leave;
use App\Enums\LeaveStatus;
use App\Enums\LogType;
use App\Http\Controllers\Controller;
use App\Notifications\StaffLeaveRelieveApproval;
use App\Notifications\StaffLeaveRelieverSupervisor;
use App\Services\WorkDaysService;
use Illuminate\Http\Request;

class RelieveController extends Controller
{
    private $user;
    private $logDetail;
    /**
     * @var WorkDaysService
     */
    private $workDaysService;

    /**
     * RelieveController constructor.
     * @param WorkDaysService $workDaysService
     */
    public function __construct(WorkDaysService $workDaysService)
    {
        $this->middleware(['auth']);

        $this->middleware(function ($request, $next) {
            $this->user = \Auth::user();
            return $next($request);
        });

        $this->logDetail = 'leave-relieve';
        $this->workDaysService = $workDaysService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relieves = $this->user->leaveRelievers()
            ->with(['user', 'leaveType'])
            ->where('reliever_status', LeaveStatus::Pending)
            ->orderBy('start', 'desc')
            ->paginate();

        $data = [
            'title' => 'Leave Relieve Requests',
            'meta_desc' => 'Leave relieve requests',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'customer',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'user/leave' => 'Leave',
                'active' => 'Relieve',
            ],
            'relieves' => $relieves,
            'work_day_service' => $this->workDaysService,
        ];
        return view('customer.user.performance.leave.relieve.index', $data);
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
        $leave = Leave::with(['user', 'leaveType'])
            ->where('reliever_id', $this->user->id)
            ->where('reliever_status', LeaveStatus::Pending)
            ->findOrFail(hashDecode($id));

        $bg_class = null;
        switch($request->action){
            case 'accept':
                $leave->reliever_status = LeaveStatus::Approved;
                $bg_class = 'success';
                if($leave->supervisor_id !== null)
                {
                    makeUserNotification($leave->supervisor->id, $leave->reliever->id, 'Leave: ' . $leave->user->name, 'Accepted relieve duty', 'user/leave/supervisor/approval' );
                    $leave->supervisor->notify(new StaffLeaveRelieverSupervisor($leave));
                }
                break;
            case 'decline':
                $leave->reliever_status = LeaveStatus::Denied;
                $bg_class = 'danger';
                break;
            default:
                return 0;
        }

        $leave->save();

        logUser(LogType::Process, $this->logDetail, $leave->tag . '|' . $leave->user->name . '|' . $request->action);
        makeUserNotification($leave->user->id, $this->user->id, $leave->tag, 'Relieve request: ' . LeaveStatus::getDescription($leave->reliever_status) );
        $leave->user->notify(new StaffLeaveRelieveApproval($leave, $this->user));

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
