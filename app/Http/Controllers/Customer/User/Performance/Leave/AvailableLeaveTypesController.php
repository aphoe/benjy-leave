<?php

namespace App\Http\Controllers\Customer\User\Performance\Leave;

use App\Customers\Models\LeaveType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvailableLeaveTypesController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware(['auth']);

        $this->middleware(function ($request, $next) {
            $this->user = \Auth::user();
            return $next($request);
        });
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = [
            'title' => 'Available Leave Types',
            'meta_desc' => 'Available leave types',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'customer',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'user/leave' => 'Leave',
                'user/leave/type' => 'Types',
                'active' => 'Available'
            ],
            'leave_types' => LeaveType::available()
                ->orderBy('name')
                ->paginate(),
            'card_title' => 'Leave types for ' . date('Y'),
            'card_sub_title' => 'All leave types that are available to you in ' . date('Y'),
        ];
        return view('customer.user.performance.leave.type.index', $data);
    }
}
