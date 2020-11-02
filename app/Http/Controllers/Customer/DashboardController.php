<?php

namespace App\Http\Controllers\Customer;

use App\Customers\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware(['auth']);

        $this->middleware(function ($request, $next) {
            $id = \Auth::user()->id;
            $this->user = User::findOrFail($id);
            return $next($request);
        });
    }

    /**
     *
     * @return Factory|View
     */
    public function index(){
        //dd($this->user);
        $data = [
            'title' => 'Dashboard',
            'meta_desc' => 'Dashboard',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'hr',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => []
        ];
        return view('customer.dashboard.index', $data);
    }
}
