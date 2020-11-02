<?php

namespace App\Http\Controllers\Customer\Performance\Leave;

use App\Customers\Models\LeaveType;
use App\Enums\LogType;
use App\Http\Controllers\Controller;
use App\Http\Requests\PerformanceLeaveTypeRequest;
use App\Interfaces\LeaveTypeRepositoryInterface;

class LeaveTypesController extends Controller
{
    private $user;
    private $logDetail;
    /**
     * @var LeaveTypeRepositoryInterface
     */
    private $leaveTypeRepository;

    /**
     * TypesController constructor.
     * @param LeaveTypeRepositoryInterface $leaveTypeRepository
     */
    public function __construct(LeaveTypeRepositoryInterface $leaveTypeRepository)
    {
        $this->middleware(['auth']);

        $this->middleware(function ($request, $next) {
            $this->user = \Auth::user();
            return $next($request);
        });

        $this->logDetail = 'leave-type';
        $this->leaveTypeRepository = $leaveTypeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave_types = LeaveType::orderBy('name')
            ->paginate();

        $data = [
            'title' => 'All Leave Types',
            'meta_desc' => 'All leave types',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'hr',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'performance/leave' => 'Leave',
                'active' => 'Leave types'
            ],
            'leave_types' => $leave_types,
        ];
        return view('customer.performance.leave.leave-type.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('permission:leave-super-admin|leave-admin');
        $data = [
            'title' => 'Create Leave Type',
            'meta_desc' => 'Create leave type',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'hr',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'performance/leave' => 'Leave',
                'performance/leave/type' => 'Leave types',
                'active' => 'Create'
            ]
        ];
        return view('customer.performance.leave.leave-type.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PerformanceLeaveTypeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerformanceLeaveTypeRequest $request)
    {
        $this->middleware('permission:leave-super-admin|leave-admin');
        $leave_type = new LeaveType();
        $this->leaveTypeRepository->store($leave_type, $request);

        logUser(LogType::Create, $this->logDetail, $leave_type->id);

        return redirect('performance/leave/type')->with('theme-success', 'Leave type created');
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
        $this->middleware('permission:leave-super-admin|leave-admin');

        $leave_type = LeaveType::findOrFail(hashDecode($id));

        $data = [
            'title' => 'Edit Leave type',
            'meta_desc' => 'Edit a leave type',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'hr',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'performance/leave' => 'Leave',
                'performance/leave/type' => 'Leave types',
                'active' => 'Edit'
            ],
            'leave_type' => $leave_type,
        ];
        return view('customer.performance.leave.leave-type.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerformanceLeaveTypeRequest $request, $id)
    {
        $this->middleware('permission:leave-super-admin|leave-admin');

        $leave_type = LeaveType::findOrFail(hashDecode($id));
        $this->leaveTypeRepository->store($leave_type, $request);

        logUser(LogType::Update, $this->logDetail, $leave_type->id);

        return redirect('performance/leave/type')->with('theme-success', 'Leave type updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware('permission:leave-super-admin');

        $leave_type = LeaveType::findOrFail(hashDecode($id));
        logUser(LogType::Delete, $this->logDetail, $leave_type->id);
        $leave_type->delete();
        return 1;
    }
}
