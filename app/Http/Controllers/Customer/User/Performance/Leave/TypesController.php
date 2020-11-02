<?php

namespace App\Http\Controllers\Customer\User\Performance\Leave;

use App\Customers\Models\LeaveType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypesController extends Controller
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
    public function __invoke()
    {
        $data = [
            'title' => 'Leave types',
            'meta_desc' => 'All leave types',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'customer',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'user/leave' => 'Leave',
                'active' => 'Types'
            ],
            'leave_types' => LeaveType::orderBy('name')
                ->paginate(),
            'card_title' => 'All  leave types',
            'card_sub_title' => 'All types of leaves on' . config('project.appName'),
        ];
        return view('customer.user.performance.leave.type.index', $data);
    }
}
