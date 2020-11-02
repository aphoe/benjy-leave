<?php

namespace App\Http\Controllers\Customer\Performance\Leave;

use App\Customers\Models\LeaveSetting;
use App\Customers\Models\LeaveType;
use App\Enums\LogType;
use App\Http\Controllers\Controller;
use App\Http\Requests\PerformanceLeaveSettingRequest;
use App\Interfaces\LeaveSettingRepositoryInterface;

class LeaveSettingsController extends Controller
{
    private $user;
    private $logDetail;
    /**
     * @var LeaveSettingRepositoryInterface
     */
    private $leaveSettingRepository;

    /**
     * LeaveSettingsController constructor.
     * @param LeaveSettingRepositoryInterface $leaveSettingRepository
     */
    public function __construct(LeaveSettingRepositoryInterface $leaveSettingRepository)
    {
        $this->middleware(['auth']);

        $this->middleware('permission:leave-super-admin|leave-admin')
            ->except('index');

        $this->middleware(function ($request, $next) {
            $this->user = \Auth::user();
            return $next($request);
        });

        $this->logDetail = 'leave-setting';
        $this->leaveSettingRepository = $leaveSettingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave_setting = LeaveSetting::orderBy('year', 'desc')
            ->with('leaveType')
            ->paginate();

        $data = [
            'title' => 'Leave settings',
            'meta_desc' => 'All leave settings',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'hr',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'performance/leave' => 'Leave',
                'active' => 'Leave setting'
            ],
            'leave_settings' => $leave_setting,
        ];
        return view('customer.performance.leave.leave-setting.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Create Leave Setting',
            'meta_desc' => 'create a new leave setting',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'hr',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'performance/leave' => 'Leave',
                'performance/leave/setting' => 'Leave setting',
                'active' => 'Create'
            ],
            'leave_types' => LeaveType::orderBy('name')
                ->pluck('name', 'id'),
        ];
        return view('customer.performance.leave.leave-setting.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerformanceLeaveSettingRequest $request)
    {
        $existing_setting = LeaveSetting::where('leave_type_id', $request->leave_type_id)
            ->where('year', $request->year)
            ->first();

        if($existing_setting !== null){
            return redirect()->back()->with('theme-warning', $existing_setting->leaveType->name . ' settings already exists for ' . $request->year);
        }

        $leave_setting = new LeaveSetting();
        $this->leaveSettingRepository->save($leave_setting, $request);

        logUser(LogType::Create, $this->logDetail, $leave_setting->id);

        return redirect('performance/leave/setting')->with('theme-success', 'Leave setting created successfully');
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
        $leave_setting = LeaveSetting::with('leaveType')
            ->findOrFail(hashDecode($id));

        $data = [
            'title' => 'Edit leave setting',
            'meta_desc' => 'edit leave setting',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'hr',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'performance/leave' => 'Leave',
                'performance/leave/setting' => 'Leave setting',
                'active' => 'Edit'
            ],
            'leave_setting' => $leave_setting,
            'leave_types' => LeaveType::orderBy('name')
                ->pluck('name', 'id'),
        ];
        return view('customer.performance.leave.leave-setting.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerformanceLeaveSettingRequest $request, $id)
    {
        $leave_setting = LeaveSetting::findOrFail(hashDecode($id));
        $this->leaveSettingRepository->save($leave_setting, $request);

        logUser(LogType::Update, $this->logDetail, $leave_setting->id);

        return redirect('performance/leave/setting')->with('theme-succes', 'Leave setting updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leave_setting = LeaveSetting::findOrFail(hashDecode($id));
        logUser(LogType::Delete, $this->logDetail, $leave_setting->id);
        $leave_setting->delete();
        return 1;
    }
}
