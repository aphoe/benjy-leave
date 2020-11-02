<?php

namespace App\Http\Controllers\Customer\User\Performance\Leave;

use App\Customers\Models\Leave;
use App\Enums\LeaveStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLeaveApplicationRequest;
use App\Interfaces\LeaveRepositoryInterface;
use App\Services\LeaveService;

class ApplicationsController extends Controller
{
    private $user;
    private $logDetail;
    private $service;
    /**
     * @var LeaveRepositoryInterface
     */
    private $leaveRepository;

    /**
     * ApplicationsController constructor.
     * @param LeaveRepositoryInterface $leaveRepository
     */
    public function __construct(LeaveRepositoryInterface $leaveRepository)
    {
        $this->middleware(['auth']);

        $this->middleware(function ($request, $next) {
            $this->user = \Auth::user();
            return $next($request);
        });

        $this->logDetail = 'leave-application';
        $this->service = new LeaveService();
        $this->leaveRepository = $leaveRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * TODO: Leave card menu
            - Handover notes
            - Extend
            - Return notes
            - Resumption form
            - Reports
            - Cancel
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Leave applications',
            'meta_desc' => 'User\'s leave application',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'customer',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'user/leave' => 'Leave',
                'active' => 'Applications'
            ],
            'leaves' => $this->user->leaves()
                ->with(['leaveType', 'reliever'])
                ->whereYear('start', date('Y'))
                ->orderBy('start', 'desc')
                ->paginate(30),
        ];
        return view('customer.user.performance.leave.application.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Leave application',
            'meta_desc' => 'Apply for leave',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'customer',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'user/leave' => 'Leave',
                'user/leave/application' => 'Applications',
                'active' => 'Apply',
            ],
            'leave_types' => $this->service->applicableLeaveTypes(),
            'relievers' => $this->service->relieverOptions(),
            'supervisors' => $this->service->supervisorOptions(),
        ];
        return view('customer.user.performance.leave.application.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserLeaveApplicationRequest $request
     * @return void
     */
    public function store(UserLeaveApplicationRequest $request)
    {
        $leave = new Leave();
        $this->leaveRepository->store($leave, $request, \Auth::id(), true);
        $this->service->notifyReliever($leave);

        return redirect('user/leave/application')->with('theme-success', 'Leave application created successfully');
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
        $leave = $this->user->leave()
            ->findOrFail(hashDecode($id));

        if($leave->taken || now()->lte($leave->start)){
            return redirect()->back()->with('theme-success', 'You cannot edit leave anymore');
        }

        $data = [
            'title' => 'Edit Leave',
            'meta_desc' => 'Edit leave',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'customer',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'user/leave' => 'Leave',
                'user/leave/application' => 'Applications',
                'active' => 'Edit',
            ],
            'leave' => $leave,
            'leave_types' => $this->service->applicableLeaveTypes(),
            'relievers' => $this->service->relieverOptions(),
            'supervisors' => $this->service->supervisorOptions(),
        ];
        return view('customer.user.performance.leave.application.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserLeaveApplicationRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserLeaveApplicationRequest $request, $id)
    {
        $leave = $this->user->leave()
            ->findOrFail(hashDecode($id));

        if($leave->taken || now()->lte($leave->start)){
            return redirect()->back()->with('theme-success', 'You cannot edit leave anymore');
        }

        $leave = $this->leaveRepository->store($leave, $request, null, true);
        $this->service->notifyReliever($leave);

        return redirect('user/leave/application')->with('theme-success', 'Your leave application has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leave = Leave::findOrFail(hashDecode($id));

        if($leave->status !== LeaveStatus::Pending){
            return 'This leave application cannot be deleted anymore.';
        }else {
            $leave->delete();
            return 1;
        }
    }
}
