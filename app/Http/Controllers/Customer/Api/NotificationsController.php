<?php

namespace App\Http\Controllers\Customer\Api;

use App\Customers\Models\Notification;
use App\Http\Controllers\Controller;
use App\Http\Resources\Customer\NotificationItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index(Request $request){
        $user = $request->user();

        $notifications = Notification::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(12)
            ->get();

        return NotificationItem::collection($notifications);
    }

    public function hasNew(Request $request){
        $user = $request->user();
        $last = Carbon::parse($request->last_time);

        $notifications = Notification::where('user_id', $user->id)
            ->where('created_at', '>', $last)
            ->get()
            ->count();

        $hasNew = $notifications > 0;

        return response()->json(['has_new' => $hasNew], 200);
    }
}
