<?php

namespace App\Http\Controllers\Customer\User\Performance\Leave\Note;

use App\Customers\Models\Leave;
use App\Enums\LeaveNoteType;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLeaveNoteRequest;
use App\Notifications\StaffLeaveHandoverNote;
use App\Repositories\LeaveNoteRepository;
use App\Services\LeaveNoteService;
use Illuminate\Http\Request;

class HandoversController extends Controller
{
    private $user;
    /**
     * @var LeaveNoteRepository
     */
    private $repository;
    /**
     * @var LeaveNoteService
     */
    private $service;
    /**
     * @var mixed
     */
    private $leaveId;
    /**
     * @var \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    private $leave;

    /**
     * HandoversController constructor.
     * @param LeaveNoteRepository $repository
     * @param LeaveNoteService $service
     */
    public function __construct(LeaveNoteRepository $repository, LeaveNoteService $service)
    {
        $this->middleware(['auth']);

        $this->middleware(function ($request, $next) {
            $this->user = \Auth::user();
            return $next($request);
        });
        $this->repository = $repository;
        $this->service = $service;
        $this->leaveId = \request()->leave;
        $this->leave = Leave::with('leaveType')
            ->findOrFail(hashDecode($this->leaveId));

    }

    public function create(){
        $this->service->checkDuplicate($this->leave, LeaveNoteType::Handover);

        $data = [
            'title' => 'Create handover note',
            'meta_desc' => 'Create  handover note',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'customer',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'user/leave' => 'Leave',
                'user/leave/application' => 'Applications',
                'user/leave/' . $this->leaveId . '/note' => 'Notes',
                'active' => 'Handover',
            ],
            'leave' => $this->leave,
            'leave_id' => $this->leaveId,
        ];
        return view('customer.user.performance.leave.note.handover.create', $data);
    }

    public function store(UserLeaveNoteRequest $request){
        $this->service->checkDuplicate($this->leave, LeaveNoteType::Handover);

        $file_name = $this->service->upload($this->leave, LeaveNoteType::Handover);
        $note = $this->repository->create($this->leave, $file_name, $request);
        /*
         * TODO: Send notification and mail
         */
        if($this->leave->reliever_id !== null){
            makeInfoNotification($this->leave->reliever_id, 'info', 'fas fa-battery-half', 'Handover note submitted: ' . $this->leave->user->name);
            $this->leave->reliever->notify(new StaffLeaveHandoverNote($note));
        }

        return redirect('user/leave/' . $this->leaveId . '/note')->with('theme-success', 'Handover note added successfully');
    }
}
