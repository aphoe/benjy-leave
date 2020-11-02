<?php

use App\Enums\NotificationType;
use App\User;
use App\Customers\Models\Notification;

if(!function_exists('notifications')){
    /**
     * Notifications for display
     * @param User $user
     * @param int $take
     * @return array
     */
    function notifications(User $user, int $take=8): array
    {
        //return demoNotifications();
        $notifications = $user->userNotifications()
            ->with('sender')
            ->orderBy('created_at', 'desc')
            ->take($take)
            ->get();

        $displays = [];
        foreach ($notifications as $notification){
            $display = [];
            //$notification = new Notification();
            if((int) $notification->type === NotificationType::Info){
                $display = [
                    'url' => $notification->url === '#' ? 'javascript:void(0);': $notification->url,
                    'bg_class' => $notification->bg_class,
                    'type' => 'info',
                    'infoClass' => $notification->info_class,
                    'user' => null,
                    'detail' => $notification->detail,
                    'time' => $notification->created_at->diffForHumans(),
                    'msg' => null,
                ];
            }elseif ((int) $notification->type === NotificationType::User){
                $display = [
                    'url' => $notification->url === '#' ? 'javascript:void(0);': $notification->url,
                    'class' => '',
                    'type' => 'user',
                    'infoClass' => null,
                    'user' => $notification->user,
                    'detail' => $notification->detail,
                    'time' => null,
                    'msg' => $notification->message,
                ];
            }

            $displays[] = (object) $display;
        }

        return $displays;
    }
}
if(!function_exists('demoNotifications')){
    /**
     * Demo notifications
     * @return array
     */
    function demoNotifications(): array
    {
        $user = new User();
        $user->photo = 'default.png';
        $user->name = 'afolabi legunsen';

        return [
            (object) [
                'url' => 'javascript:void(0);',
                'bg_class' => 'bg-primary',
                'type' => 'info',
                'infoClass' => 'uil uil-user-plus',
                'user' => null,
                'detail' => 'New user registered.',
                'time' => '5 hours ago',
                'msg' => null,
            ],
            (object) [
                'url' => 'javascript:void(0);',
                'bg_class' => '',
                'type' => 'user',
                'infoClass' => null,
                'user' => $user,
                'detail' => 'Karen Robinson',
                'time' => null,
                'msg' => 'Wow! this admin looks good and awesome design',
            ],
            /*(object) [
                'url' => 'javascript:void(0);',
                'class' => '',
                'type' => ,
                'infoClass' => ,
                'user' => ,
                'detail' => ,
                'time' => ,
                'msg' => ,
            ],*/
        ];
    }
}
if(!function_exists('countNewNotifications'))
{
    /**
     *
     * @param User $user
     * @return int
     */
    function countNewNotifications(User $user): int
    {
        $count = Notification::where('user_id', $user->id)
            ->where('created_at', '>=', $user->last_online_at)
            ->count();
        return $count;
    }
}
if(!function_exists('makeNotification')){
    /**
     * Make notification
     * @param int $user_id
     * @param string $bg_class
     * @param int $type
     * @param string $detail
     * @param string $url
     * @param string|null $info_class
     * @param int|null $sender_id
     * @param string|null $message
     */
    function makeNotification(
        int $user_id,
        string $bg_class,
        int $type,
        string $detail,
        string $url='#',
        string $info_class = null,
        int $sender_id = null,
        string $message = null
    ){
        $notification = new Notification();
        $notification->user_id = $user_id;
        $notification->bg_class = $bg_class === '' ? null : $bg_class;
        $notification->type = $type;
        $notification->detail = $detail;
        $notification->url = $url;
        $notification->info_class = $info_class;
        $notification->sender_id = $sender_id;
        $notification->message = $message;
        $notification->save();
    }
}
if(!function_exists('makeInfoNotification')){
    /**
     * Info type notification
     * @param int $user_id
     * @param string $bg_class
     * @param string $info_class
     * @param string $detail
     * @param string $url
     */
    function makeInfoNotification(
        int $user_id,
        string $bg_class,
        string $info_class,
        string $detail,
        string $url = '#'
    ){
        makeNotification($user_id, $bg_class, NotificationType::Info, $detail, $url, $info_class);
    }
}
if(!function_exists('makeUserNotification')){
    /**
     * User type notification
     * @param int $user_id
     * @param int $sender_id
     * @param string $detail
     * @param string $message
     * @param string $url
     */
    function makeUserNotification(
        int $user_id,
        int $sender_id,
        string $detail,
        string $message,
        string $url = '#'
    ){
        makeNotification($user_id, '', NotificationType::User, $detail, $url, null, $sender_id, $message);
    }
}
